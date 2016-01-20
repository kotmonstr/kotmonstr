<?php

namespace app\modules\shop;

use Yii;



class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\shop\controllers';

    public function init()
    {

        parent::init();


    }

    // Вернет картинку товара если есть иначе дефаультную
    public static function getGoodImage($image = null)
    {
        if ($image && file_exists(Yii::getAlias('@frontend') . '/web/upload/goods/' . $image)) {
            return '/upload/goods/' . $image;
        } else {
            return '/img-custom/no_photo.jpg';
        }
    }

    // вернет url
    public function GetPath(){
        $moduleName = Yii::$app->controller->module->id;
        $controllerName = Yii::$app->controller->id;
        $actionName = Yii::$app->controller->action->id;
        $PATH = $moduleName .'/'. $controllerName .'/'. $actionName;
        return $PATH;

    }

}
