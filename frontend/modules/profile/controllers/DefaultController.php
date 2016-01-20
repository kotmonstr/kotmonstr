<?php

namespace app\modules\profile\controllers;

use Yii;
use yii\web\Controller;
use common\models\Profile;
use common\models\User;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * DefaultController implements the CRUD actions for Image model.
 */
class DefaultController extends Controller {

    public $layout = '/blog';

    public function actionForm() {
        //vd(1);
        $model = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        if (!$model) {
            $model = new Profile();
        }


        if ($model->load(Yii::$app->request->post())) {
            //vd($_POST);
            if ($model->validate()) {
                $model->gender = $_POST['gender'];
                $model->user_id = Yii::$app->user->id;
                $model->login = User::getLoginById(Yii::$app->user->id);
                $model->save();
                return $this->render('form', [
                            'model' => $model,
                ]);
            } else {
                vd($model->getErrors());
            }
        }

        return $this->render('form', [
                    'model' => $model,
        ]);
    }

    public function actionImageSubmit() {
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/user/' . Yii::$app->user->id . '/avatar');
        $path = Yii::getAlias('@frontend') . '/web/upload/user/' . Yii::$app->user->id . '/avatar/';

        $model = new Profile;
        $name = date("dmYHis", time());
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'avatar');
            $model->file->saveAs($path  . 'avatar' .'.'. $model->file->extension);
       

            //$_model->save();
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Yii::$app->user->id .'/avatar/avatar' .'.'. $model->file->extension;
        }
    }

}
