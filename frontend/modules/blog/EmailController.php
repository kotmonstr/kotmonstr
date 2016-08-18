<?php
namespace console\controllers;
use common\models\Email;

class EmailController extends \yii\console\Controller {

    public function actionIndex() {

        file_put_contents(Yii::getAliase('@console').DIRECTORY_SEPARATOR.'text.txt','RECORD');

        //$model = new Email;
        //$model->email = 1;
        //$model->save();
    }

}
