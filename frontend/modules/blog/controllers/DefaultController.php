<?php

namespace app\modules\blog\controllers;


use yii\web\Controller;
use common\models\Blog;
use Yii;
use common\models\BlogSearch;
use yii\data\Pagination;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use common\models\Comment;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use common\models\ImportNews;
use app\modules\core\controllers\CoreController;
use keltstr\simplehtmldom\SimpleHTMLDom as SHD;
use vova07\imperavi\actions\GetAction;
use yii\web\Response;

class DefaultController extends CoreController
{
    public $meta = [];
    
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
                        'actions' => ['create', 'update', 'delete', 'create-image', 'parser-start', 'show', 'image-upload', 'images-get', 'upload'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['index', 'view', 'views','add-news-from-parser'],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => '/frontend/web/upload/imp/', // URL адрес папки куда будут загружатся изображения.
                //'path' => Yii::getAlias('@frontend') . '/web/upload/imp' // Или абсолютный путь к папке куда будут загружатся изображения.
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => '/frontend/web/upload/imp/', // URL адрес папки куда будут загружатся изображения.
                //'path' => Yii::getAlias('@frontend') . '/web/upload/imp', // Или абсолютный путь к папке куда будут загружатся изображения.
                'type' => GetAction::TYPE_IMAGES,
            ]
        ];
    }

    public $layout = '/blog';

    public function actionIndex()
    {
        //$this->layout = '/blog';
        // Вывести список статей

        $pageSize = 9;
        $query = Blog::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pageSize]);
        $models = $query->offset($pages->offset)
            ->orderBy('id DESC')
            ->limit($pages->limit)
            ->all();

        $modelLastBlog = Blog::find()
            ->orderBy('id DESC')
            ->limit(3)
            ->all();

        $modeMostWatched = Blog::find()
            ->orderBy('view DESC')
            ->limit(3)
            ->all();


        return $this->render('index', ['model' => $models,
            'modelLastBlog' => $modelLastBlog,
            'modeMostWatched' => $modeMostWatched,
            'pages' => $pages,
            'pageSize' => $pageSize
        ]);
    }

    public function actionView()
    {
        $this->layout = '/adminka';
        $slug = Yii::$app->request->get('slug');
        //$blog = $this->findModel($id);
        $blog = Blog::find()->where(['slug' => $slug])->one();
        return $this->render('view', ['model' => $blog]);
    }

    public function actionShow()
    {
        $this->layout = '/adminka';
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('show', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $this->layout = '/adminka';
        $model = new Blog();
        $time = time();


        if ($model->load(Yii::$app->request->post())) {

            if (UploadedFile::getInstance($model, 'file')) {
                $uploaddir = Yii::getAlias('@frontend') . '/web/upload/upload_news/';
                FileHelper::createDirectory($uploaddir);
                $file = \yii\web\UploadedFile::getInstance($model, 'file');
                $file->saveAs($uploaddir . $time . '.' . $file->extension);
                $model->image = $time . '.' . $file->extension;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $this->layout = '/adminka';
        $model = $this->findModel($id);
        if (\yii\web\UploadedFile::getInstance($model, 'file') != '') {
            $time = time();
            $uploaddir = Yii::getAlias('@frontend') . '/web/upload/upload_news/';
            FileHelper::createDirectory($uploaddir);
            $file = \yii\web\UploadedFile::getInstance($model, 'file');
            $file->saveAs($uploaddir . $time . '.' . $file->extension);
            $model->image = $time . '.' . $file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } elseif ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['show']);
    }

    protected function findModel($id)
    {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateImage()
    {
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/blog');
        $model = new Blog();
        $name = date("dmYHis", time());
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('upload/blog/' . $name . '.' . $model->file->extension);
            $full_name = $name . '.' . $model->file->extension;
            return '/upload/blog/' . $full_name;
        }
    }

    public function actionViews()
    {

        $this->layout = '/blog';


        $slug = Yii::$app->request->get('slug');
        $blog = Blog::find()->where(['slug' => $slug])->one();
        if ($blog) {
            $viwsQuantity = (int)$blog->view;
            $blog->view = $viwsQuantity + 1;
            $blog->updateAttributes(['view']);
            $coment_model = Comment::find()->where(['blog_id' => $blog->id])->all();
            $this->meta = $blog;

            $prevBlog = Blog::find()->where('id >' . $blog->id )->orderBy('id ASC')->limit(1)->asArray()->all();
            $nextBlog  = Blog::find()->where('id <' . $blog->id )->orderBy('id DESC')->limit(1)->asArray()->all();
//vd($prevBlog[0]['slug']);
            return $this->render('views', [
                                           'model' => $blog,
                                           'coment_model' => $coment_model,
                                           'nextBlog'=> !empty($nextBlog) ? $nextBlog[0]['slug'] : NULL,
                                           'prevBlog'=> !empty($prevBlog) ? $prevBlog[0]['slug'] : NULL
                                                                    ]);
        } else {
            $this->redirect('site/index');
        }
    }

    public function actionAddNewsFromParser()
    {
        $result = 0;
        $ImportModel = file_get_contents(Yii::getAlias('@json') . DIRECTORY_SEPARATOR . 'import.json');
        //vd(Yii::getAlias('@json').DIRECTORY_SEPARATOR.'import.json');
        //$ImportModel = ImportNews::find()->all();
        $obj = json_decode($ImportModel);
        //vd($obj);
        if ($ImportModel) {
            foreach ($obj as $row) {

                $duble = Blog::getDublicateByTitle($row->title);
                if (!$duble) {
                    $model = new Blog();
                    $model->title = $row->title;
                    $model->image = $row->image ? $row->image : '';
                    $model->content = $row->content;
                    //$model->created_at = $row->created_at;
                    $model->updated_at = time();
                    $model->author = 1;
                    //$model->validate();
                    // vd($model->getErrors());
                    $model->save();
                    $result =1;
                } else {

                }

            }
        }
        return $result;
    }

    public function actionParserStart()
    {

        $file = Yii::getAlias('@json') . DIRECTORY_SEPARATOR . 'import.json';
        if (file_exists($file)) {
            unlink($file);
        }

        //SET SESSION wait_timeout=600000;
        ini_set('max_execution_time', 60000);
        ini_set('wait_timeout', 60000);
        ini_set('memory_limit', '128M');
        ini_set('default_charset', 'UTF-8');
        //header('Content-Type: text/html; charset=UTF-8');

        $arrResult = [];
        $arrResult2 = [];
        $html = SHD::file_get_html('http://politrussia.com/news/');

        // Find all links
        foreach ($html->find('a.overlink') as $element) {
            //echo $element->href. '<br>';
            $arrResult[] = $element->href;
        }

        $i = 0;
        foreach ($arrResult as $key => $link) {
            $html = SHD::file_get_html('http://politrussia.com' . $link);
            $i++;
            $content = $html->find('div[class="news_text"]', 0)->plaintext;
            $title = $html->find('h1[itemprop="name"]', 0)->plaintext;

            foreach ($html->find('img[itemprop="contentUrl"]') as $element) {
                $img2 = 'http://politrussia.com' . $element->src;
            }

            //$content2 = mb_convert_encoding($content, "UTF-8");
            //$title2 = mb_convert_encoding($title, "UTF-8");

            $arrResult2[$key]['title'] = $title;
            $arrResult2[$key]['content'] = $content;
            $arrResult2[$key]['image'] = $img2;
        }
        //vd($arrResult2);

        if (!empty($arrResult2)) {
            //$model = ImportNews::deleteAll();


// данные в json
            $data = json_encode($arrResult2);
            //echo $data;
            //vd(1);

            $file2 = Yii::getAlias('@json') . DIRECTORY_SEPARATOR . 'import.json';
            file_put_contents($file2, $data);
        }

//        ImportNews::deleteAll();
//        foreach($arrResult2 as $key => $row){
//
//            $modelBlog = new ImportNews();
//            $modelBlog->title = $row['title'];
//            $modelBlog->content = $row['content'];
//            $modelBlog->created_at = time();
//            $modelBlog->updated_at = time();
//            $modelBlog->author = Yii::$app->user->id;
//            $modelBlog->image = $row['img'];
//
//            //$dublicate = ImportNews::getDublicateByTitle($row['title']);
//            //if(!$dublicate){
//                $modelBlog->save();
//            //}
//
//
//        }


        return $this->redirect('/admin/index');
    }

    // Вернет только что загруженное фото
    public function actionUpload()
    {
        $uploaddir = Yii::getAlias('@frontend') . '/web/upload/imp/';
        $file = md5(date('YmdHis')) . '.' . pathinfo(@$_FILES['file']['name'], PATHINFO_EXTENSION);
        if (move_uploaded_file(@$_FILES['file']['tmp_name'], $uploaddir . $file)) {
            $array = array(
                'filelink' => '/upload/imp/' . $file
            );
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $array;
    }


    // Вернет уже загруженные файлы
    public function actionUploaded()
    {

        $uploaddir = Yii::getAlias('@frontend') . '/web/upload/imp/';
        $arr = scandir($uploaddir);
        $i = 0;
        foreach ($arr as $key => $val) {
            $i++;
            if ($i > 2) {
                $array['filelink' . $i]['thumb'] = '/upload/imp/' . $val;
                $array['filelink' . $i]['image'] = '/upload/imp/' . $val;
                $array['filelink' . $i]['title'] = '/upload/imp/' . $val;
            }
        }
        $array = stripslashes(json_encode($array));
        echo $array;
    }

}
