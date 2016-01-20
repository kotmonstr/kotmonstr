<?php

namespace app\modules\goods\controllers;


use Yii;
use common\models\Goods;
use common\models\GoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;


/**
 * DefaultController implements the CRUD actions for Shop model.
 */
class DefaultController extends Controller
{
    public $layout = '/adminka';

    public function behaviors()
    {
        return ['verbs' => ['class' => VerbFilter::className(), 'actions' => ['delete' => ['post'],],], 'access' => ['class' => AccessControl::className(), //'only' => ['index'],
            'rules' => [['actions' => ['index', 'view', 'create', 'update', 'delete', 'submit'], 'allow' => true, 'roles' => ['@'],],],],];
    }

    /**
     * Lists all Shop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider,]);
    }

    /**
     * Displays a single Shop model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id),]);
    }

    /**
     * Creates a new Shop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image_file');
            $model->image = $image->name;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    /**
     * Updates an existing Shop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model, 'image_file')){
                $image = UploadedFile::getInstance($model, 'image_file');
                $model->image = $image->name;
                $model->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);


        } else {
            return $this->render('update', ['model' => $model,]);
        }
    }

    /**
     * Deletes an existing Shop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubmit()
    {
        $arrResult = [];
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/goods');
        $model = new Goods();

        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image_file');
            $model->image->saveAs('upload/goods/' . $model->image);
            $full_name = $model->image->name;
            $arrResult['imageName'] = $full_name;
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $arrResult;
        }
    }
}
