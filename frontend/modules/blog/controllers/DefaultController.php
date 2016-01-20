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

class DefaultController extends Controller {
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
                        'actions' => ['create','update','delete','create-image'],
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
        //$this->layout = '/blog';
        // Вывести список статей

        $query = Blog::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => 10]);
        $models = $query->offset($pages->offset)
                ->orderBy('created_at DESC')
                ->limit($pages->limit)
                ->all();

        $modelLastBlog = Blog::find()
            ->orderBy('id DESC')
            ->limit(5)
            ->all();

        $modeMostWatched = Blog::find()
            ->orderBy('view DESC')
            ->limit(5)
            ->all();


        return $this->render('index', [ 'model' => $models,
                            'modelLastBlog'=> $modelLastBlog,
                            'modeMostWatched'=> $modeMostWatched,
                            'pages' => $pages]);
    }

    public function actionView() {
        $this->layout = '/adminka';
        $id = Yii::$app->request->get('id');
        $blog = $this->findModel($id);
        //$blog = Blog::find()->where(['id' => $id])->one();
        return $this->render('view', ['model' => $blog]);
    }

    public function actionShow() {
        $this->layout = '/adminka';
        $searchModel = new BlogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('show', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        $this->layout = '/adminka';
        $model = new Blog();

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

        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = Blog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateImage() {
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

    public function actionViews($id) {
        $this->layout = '/blog';


        $id = Yii::$app->request->get('id');
        $blog = Blog::find()->where(['id' => $id])->one();
        $viwsQuantity =(int)$blog->view;
        $blog->view = $viwsQuantity +1;
        $blog->updateAttributes(['view']);
        $coment_model = Comment::find()->where(['blog_id'=>$id])->all();
        return $this->render('views', ['model' => $blog,'coment_model'=> $coment_model]);
    }

}
