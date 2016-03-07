<?php

namespace frontend\components;

use common\models\Online;
use yii\helpers\Html;
use yii\helpers\BaseArrayHelper;
use Yii;

class OnlineHelper extends BaseArrayHelper
{

    public static function getlastloginTime()
    {

        if(Yii::$app->user->isGuest){
            return false;
        }else{
            $currentId = Yii::$app->user->identity->getId();
            $lastTime = Online::getlastitmeById($currentId);
            $time = Yii::$app->formatter->asDatetime($lastTime,'long');
            return $time;
        }
    }

    public static function getlastDifferentInTime()
    {

        if(Yii::$app->user->isGuest){
            return false;
        }else{
            $currentId = Yii::$app->user->identity->getId();
            $lastTime = Online::getlastitmeById($currentId);
            $dif = time() - $lastTime;
            $time = Yii::$app->formatter->asDatetime($dif,'medium');
            return date('h' ,$dif).' часа назад';
        }
    }


}