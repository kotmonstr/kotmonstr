<?php

namespace app\modules\image\controllers;

use app\modules\core\controllers\CoreController;
use Yii;
use common\models\ImageSlider;
use common\models\ImageSliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\imagine\Image;
use common\models\Photo;
use yii\helpers\FileHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class DefaultController extends CoreController {
    
        public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get','post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['preview','upload','index', 'view', 'create', 'update', 'delete','upload-submit','form','form-multy','get-photo','submit-multy','delete-photo','change-activety'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],  [
                        'actions' => ['view','get-photo','preview'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public $layout = '/adminka';
    public $enableCsrfValidation = false;

    public function actionIndex() {

        $searchModel = new ImageSliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpload() {
        $model = new ImageSlider;
        return $this->render('upload', ['model' => $model]);
    }

    public function actionUploadSubmit() {

        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/slider-big');
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/slider-thumbs');

        $model = new ImageSlider();
        $name = date("dmYHis", time());
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('upload/slider-big/' . $name . '.' . $model->file->extension);
            $full_name = $name . '.' . $model->file->extension;
            $_model = new ImageSlider();
            $_model->name = $full_name;
            $_model->save();
            Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/slider-big/' . $full_name, 1200, 500)
                    ->save(Yii::getAlias(Yii::getAlias('@frontend') . '/web/upload/slider-thumbs/' . $full_name), ['quality' => 80]);
            Yii::$app->session->setFlash('success', 'Фоторгафии удачно сохранены');
        } else {
            Yii::$app->session->setFlash('error', 'Фоторгафии не удачно сохранены');
        }

        return $this->redirect('upload');
    }

    public function actionView($id) {

      //  $this->layout = '/photo-slider';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate() {
        $model = new Image();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model, 'name');
            if ($fileModel = FileModel::saveAs($file, '@common/upload')) {
                
            }
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->saveUploadedFile() !== false) {
                    $model->save();
                    return $this->redirect('image/create',['model' => $model]);
                }
            } else {
                return $this->render('create', ['model' => $model]);
            }
        }
    }

    public function actionUpdate($id) {
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
        if (($model = ImageSlider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionForm() {
        return $this->render('form');
    }

    public function actionFormMulty() {
        $model = Photo::find()->all();
        return $this->render('form-multy', ['_model' => $model]);
    }

    public function actionGetPhoto() {
        $model = Photo::find()->all();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->renderAjax('get-photo', ['_model' => $model]);
    }

    public function actionSubmitMulty() {

        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/multy-big');
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/multy-thumbs');

        $arr = [];
        $i = 0;
        $model = new ImageSlider();
        $name = date("dmYHis", time());
        if (\yii\web\UploadedFile::getInstances($model, 'file')) {
            $model->file = \yii\web\UploadedFile::getInstances($model, 'file');
            foreach ($model->file as $file) {
                $i++;
                $file->saveAs('upload/multy-big/' . $name . '-' . $i . '.' . $file->extension);
                Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/multy-big/' . $name . '-' . $i . '.' . $file->extension, 1200, 500)
                        ->save(Yii::getAlias(Yii::getAlias('@frontend') . '/web/upload/multy-thumbs/' . $name . '-' . $i . '.' . $file->extension), ['quality' => 80]);
                $_model = new Photo();
                $_model->name = $name . '-' . $i . '.' . $file->extension;
                $_model->save();
                $arr[] = $name . '-' . $i . '.' . $file->extension;
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $arr;
        }
    }
    public function actionDeletePhoto(){
        $name= Yii::$app->request->post('name');
        $model = Photo::find()->where(['name'=> $name])->one();
        $model->delete();
       
    }
    public function actionChangeActivety(){
        $arrResult = [];
        $id= Yii::$app->request->post('id');
        $state= Yii::$app->request->post('state');
        //vd( $id .': ' .$state );
       if($state == 'true'){$status = 0;}else{$status = 1;}
        if($id){
            $model = ImageSlider::find()->where(['id'=> $id])->one();  
            $model->status = $status;
            $model->updateAttributes(['status']);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $arrResult['state']=$status;
        $arrResult['id']=$id;
        return $arrResult;
    }

    public function actionPreview(){
        $this->layout = '/photo-slider';
        //$model = Photo::find()->all();

        return $this->render('preview');
    }

}
