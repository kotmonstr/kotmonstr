<?php

namespace app\modules\article\controllers;

use common\models\simple_html_dom;
use yii\web\Controller;
use common\models\Article;
use Yii;
use yii\data\Pagination;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use common\models\Comment;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\modules\core\controllers\CoreController;
use common\models\ArticleSearch;

class DefaultController extends CoreController {
     public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
             'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['create','update','delete','create-image','add-news-from-parser','parser-start','image-submit'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index','view','show','views'],
                        'allow' => true,
                        'roles' => ['@','?'],
                    ],
                ],
            ],
        ];
    }

    public $layout = '/blog';

    public function actionIndex() {

        // Вывести список статей
        $pageSize =9;
        $query = Article::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pageSize]);
        $models = $query->offset($pages->offset)
                ->orderBy('created_at DESC')
                ->limit($pages->limit)
                ->all();

        $modelLastArticle = Article::find()
            ->orderBy('id DESC')
            ->limit(3)
            ->all();

        $modeMostWatched = Article::find()
            ->orderBy('view DESC')
            ->limit(3)
            ->all();


        return $this->render('index', [ 'model' => $models,
                            'modelLastArticle'=> $modelLastArticle,
                            'modeMostWatched'=> $modeMostWatched,
                            'pages' => $pages,
                            'pageSize'=> $pageSize
        ]);
    }

    public function actionView() {
        $this->layout = '/adminka';
        $id = Yii::$app->request->get('id');
        $Article = $this->findModel($id);
        //$Article = Article::find()->where(['id' => $id])->one();
        return $this->render('view', ['model' => $Article]);
    }

    public function actionShow() {

        $this->layout = '/adminka';
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //vd(1);
        return $this->render('show', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $this->layout = '/adminka';
        $model = new Article();

//        if (Yii::$app->request->post()) {
//
//        $model->load(Yii::$app->request->post());
//        $model->validate();
//        vd($model->getErrors());
//    }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id) {
        $this->layout = '/adminka';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['show']);
    }

    protected function findModel($id) {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateImage() {
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/Article');
        $model = new Article();
        $name = date("dmYHis", time());
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('upload/Article/' . $name . '.' . $model->file->extension);
            $full_name = $name . '.' . $model->file->extension;
            return '/upload/Article/' . $full_name;
        }
    }

    public function actionViews() {

        $this->layout = '/blog';


        $id = Yii::$app->request->get('id');
        $Article = Article::find()->where(['id' => $id])->one();
        if($Article) {
            $viwsQuantity = (int)$Article->view;
            $Article->view = $viwsQuantity + 1;
            $Article->updateAttributes(['view']);
            $coment_model = Comment::find()->where(['blog_id' => $id])->all();
            return $this->render('views', ['model' => $Article, 'coment_model' => $coment_model]);
        }else{
            $this->redirect('site/error');
        }
    }

    public function actionAddNewsFromParser(){
        $ImportModel = file_get_contents(Yii::getAlias('@json').DIRECTORY_SEPARATOR.'import.json');
        //vd(Yii::getAlias('@json').DIRECTORY_SEPARATOR.'import.json');
        //$ImportModel = ImportNews::find()->all();
        $obj = json_decode($ImportModel);
        //vd($obj);
        if($ImportModel) {
            foreach ($obj as $row) {

                $duble = Article::getDublicateByTitle($row->title);
                if (!$duble) {
                    $model = new Article();
                    $model->title = $row->title;
                    $model->image = $row->image ? $row->image : '';
                    $model->content = $row->content;
                    $model->created_at = $row->created_at;
                    $model->updated_at = $row->updated_at;
                    $model->author = $row->author;
                    $model->save();
                } else {
                    //echo "It is Dublicate", PHP_EOL;
                }

            }
        }
        return $this->redirect('/admin/index');
    }

    public function actionParserStart(){


        //SET SESSION wait_timeout=600000;
        ini_set('max_execution_time', 60000);
        ini_set('wait_timeout', 60000);
        ini_set('memory_limit', '128M');
        ini_set( 'default_charset', 'UTF-8' );
        //header('Content-Type: text/html; charset=UTF-8');


        $arrResult = [];
        $arrResult2 = [];
        $html = new simple_html_dom();
        $html->load_file('http://politrussia.com/news/');

        // Find all links
        foreach ($html->find('a.overlink') as $element) {
            //echo $element->href. '<br>';
            $arrResult[] = $element->href;
        }
        //vd($arrResult);


        $i = 0;
        foreach ($arrResult as $key => $link) {
            $html->load_file('http://politrussia.com' . $link);
            $i++;
            $content = $html->find('div[class="news_text"]', 0)->plaintext;
            $title = $html->find('h1[itemprop="name"]', 0)->plaintext;

            foreach ($html->find('img[itemprop="contentUrl"]') as $element) {
                $img2 = 'http://politrussia.com' . $element->src;
            }

            $content2 = mb_convert_encoding($content, "UTF-8", "Windows-1251");
            $title2 = mb_convert_encoding($title, "UTF-8", "Windows-1251");

            $arrResult2[$key]['title'] = $title2;
            $arrResult2[$key]['content'] = $content2;
            $arrResult2[$key]['image'] = $img2;
        }

        if(!empty($arrResult2)){
            //$model = ImportNews::deleteAll();


// данные в json
            $data = json_encode($arrResult2);
            //echo $data;
            //vd(1);

            $file = Yii::getAlias('@json').DIRECTORY_SEPARATOR.'import.json';
            file_put_contents($file, $data);
        }

//        ImportNews::deleteAll();
//        foreach($arrResult2 as $key => $row){
//
//            $modelArticle = new ImportNews();
//            $modelArticle->title = $row['title'];
//            $modelArticle->content = $row['content'];
//            $modelArticle->created_at = time();
//            $modelArticle->updated_at = time();
//            $modelArticle->author = Yii::$app->user->id;
//            $modelArticle->image = $row['img'];
//
//            //$dublicate = ImportNews::getDublicateByTitle($row['title']);
//            //if(!$dublicate){
//                $modelArticle->save();
//            //}
//
//
//        }

        return $this->redirect('/admin/index');
    }
    public function actionImageSubmit() {
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/article');
        $path = Yii::getAlias('@frontend') . '/web/upload/article/';

        $model = new Article();
        $name = date("dmYHis", time());
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs($path  . $name .'.'. $model->file->extension);
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return  $name .'.'. $model->file->extension;
        }
    }
}
