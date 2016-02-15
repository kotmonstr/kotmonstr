<?php

namespace app\modules\book\controllers;


use yii\web\Controller;
use Yii;
use common\models\Book;
use common\models\BookSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use app\modules\core\controllers\CoreController;

class DefaultController extends CoreController {

    public $layout = '/blog';

    public function actionViews() {
         $model = Book::find()->all();
        return $this->render('views',['model'=>$model]);
    }

    public function actionDownload() {
        $file = Yii::$app->request->get('file');
        $path = dirname(__DIR__) . '/frontend/web/book/';
        $file = $path . $file;
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }

    public function actionMatch() {
         $arrResult = [];
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $id = Yii::$app->request->post('id');
        $model = Book::find()->where(['id' => $id])->one();
        if ($model) {
            $curDownloads = (int)$model->download;
            $model->download = $curDownloads+1;
            $model->save();
             $arrResult['result'] = 'ok';
        } else {
             $arrResult['result'] = 'error';
        }
        return $arrResult;
    }
    public function actionIndex(){
        $this->layout='/adminka';
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate()
    {
        $this->layout='/adminka';
        $model = new Book();

        if ($model->load(Yii::$app->request->post())) {

            FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/book-big');
            FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/book-thumbs');
            $name = date("dmYHis", time());
            if (Yii::$app->request->isPost) {
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->image) {
                    $model->image->saveAs('upload/book-big/' . $name . '.' . $model->image->extension);
                    $full_name = $name . '.' . $model->image->extension;
                    $model->image = $full_name;
                    Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/book-big/' . $full_name, 1200, 500)
                        ->save(Yii::getAlias(Yii::getAlias('@frontend') . '/web/upload/book-thumbs/' . $full_name), ['quality' => 80]);
                }
                if ($model->file) {
                    $model->file->saveAs('book/' . $name . '.' . $model->file->extension);
                    $full_name_zip = $name . '.' . $model->file->extension;
                    $model->file = $full_name_zip;
                    $model->eng_name = $full_name_zip;
                }
                //vd($model);
                $model->download = 0;
                $model->save();

                Yii::$app->session->setFlash('success', 'Данные удачно сохранены');
            } else {
                Yii::$app->session->setFlash('error', 'Данные не удачно сохранены');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionView($id)
    {
        $this->layout='/adminka';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $this->layout='/adminka';
        $model = $this->findModel($id);







            if ($model->load(Yii::$app->request->post()) ) {
            FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/book-big');
            FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/book-thumbs');
            $name = date("dmYHis", time());

            if( UploadedFile::getInstance($model, 'image')){
                //vd(UploadedFile::getInstance($model, 'image'));
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->image->saveAs('upload/book-big/' . $name . '.' . $model->image->extension);
                $full_name = $name . '.' . $model->image->extension;
                $model->image = $full_name;
                Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/book-big/' . $full_name, 1200, 500)
                    ->save(Yii::getAlias(Yii::getAlias('@frontend') . '/web/upload/book-thumbs/' . $full_name), ['quality' => 80]);
            }
           if(UploadedFile::getInstance($model, 'file')){
               $model->file = UploadedFile::getInstance($model, 'file');
               $model->file->saveAs('book/' . $name . '.' . $model->file->extension);
               $full_name_zip = $name . '.' . $model->file->extension;
               $model->file = $full_name_zip;
               $model->eng_name = $full_name_zip;
           }
      
            if( $model->save()){
                Yii::$app->session->setFlash('success', 'Данные удачно сохранены');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка!,Данные не удачно сохранены');
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

}
