<?php

namespace app\modules\email\controllers;

use yii\web\Controller;
use common\models\NewsletterForm;
use Yii;
use common\models\Email;
use yii\filters\VerbFilter;
use common\models\EmailSearch;
use yii\filters\AccessControl;
use yii\mail\BaseMailer;

class DefaultController extends Controller {

    public function behaviors() {
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
                        'actions' => ['submit','index', 'view', 'create', 'update', 'delete','send'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public $layout = '/adminka';

    public function actionSend() {

        //BaseMailer::useFileTransport = false;

        $modelEmail = Email::find()->all();
        //vd($modelEmail);
        foreach($modelEmail as $email){
            Yii::$app->mailer->compose(['html'=>'@common/mail/letter'],[ 'name' => 'Sir.Kotmonstr','imageFileName' => Yii::getAlias('@frontend').'/web/img/1.jpg'])
                ->setFrom('kotmonstr@local.com')
                ->setTo($email->email)
                ->setSubject('Firs test email by Kostya')
                //->setTextBody('Plain text content')
                //->setHtmlBody('<b>Kotmonstr.ru</b>')
                ->send();
                }


        return $this->redirect('/email/index');
    }
    public function actionSubmit() {
        //vd($_POST);
        $model = new NewsletterForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $_model = new Email;
            $_model->email = Yii::$app->request->post('NewsletterForm')['email'];
            //$_model->validate();
            //vd($_model->getErrors());
            $_model->save();
        }
        return $this->redirect('/site/index');
    }


    /**
     * Lists all Email models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Email model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Email model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Email();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Email model.
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
     * Deletes an existing Email model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Email model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Email the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Email::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
