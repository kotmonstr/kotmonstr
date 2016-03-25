<?php

namespace app\modules\comment\controllers;

use Yii;
use common\models\Comment;
use common\models\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\core\controllers\CoreController;

/**
 * DefaultController implements the CRUD actions for Comment model.
 */
class DefaultController extends CoreController {

    public $layout = '/adminka';


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
                        'actions' => ['index','view','create','update','delete','add'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['@','?'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Lists all Comment models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Comment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Comment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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

    /**
     * Deletes an existing Comment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAdd() {
        $identity = Yii::$app->getUser()->getIdentity();
        if (isset($identity->profile)) {
            //vd($identity->profile);
        }

        $comment_id = Yii::$app->request->post('comment_id');
        $message = Yii::$app->request->post('message');
        if($message &&  $message!=''){
        $model = new Comment;
        $model->content = $message;
        $model->blog_id = $comment_id;
        $model->author_id = Yii::$app->user->id ? Yii::$app->user->id : null;
        $model->social_name = $identity ? $identity->profile['name'] : null;
        $model->social_avatar = $identity && !empty($identity->profile['photo'] ) ? $identity->profile['photo'] : null;
        //$model->validate();
        //vd($model->getErrors());
        $model->save();
        }else{
             throw new NotFoundHttpException('Пустое сообщение.');
        }
         $arrResult = [];
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $arrResult['html']= $this->renderAjax('_oneAjaxComment',['model'=>$model]);
        return $arrResult;
    }

}
