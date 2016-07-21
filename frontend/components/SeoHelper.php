<?php
namespace app\components;

use common\models\Seo;
use yii\helpers\BaseArrayHelper;
use Yii;
use yii\helpers\Html;
use yii\helpers\StringHelper;
class SeoHelper extends BaseArrayHelper
{

    public static function getMeta($arr=null)
    {
        if($arr){ ?>
            <title><?= Html::encode($arr->title); ?>| kotmonstr.com | артефакты прошлого</title>
            <meta name="description"
                  content="<?= Html::encode(StringHelper::truncate(isset($arr->content) ? $arr->content : $arr->title,200)) ?>">
            <meta name="keywords"
                  content="Артефакты прошлого , альтернативная история , ведическая культура , ведическая библиотека">
        <? }else{
            $module = Yii::$app->controller->module->id;
            $controller = Yii::$app->controller->id;
            $action = Yii::$app->controller->action->id;
            $url = $module .'/'. $controller . '/' . $action;
            $meta = Seo::getPageMeta($url);
            //vd($meta);
            ?>
            <title><?= $meta ? Html::encode($meta->title) : '| kotmonstr.com | артефакты прошлого<' ?></title>
            <meta name="description"
                  content="<?= is_object($meta) ? Html::encode($meta->description) : 'kotmonstr.com | артефакты прошлого' ?>">
            <meta name="keywords"
                  content="<?= is_object($meta) ? Html::encode($meta->keywords) : 'kotmonstr.com | артефакты прошлого | альтернативная история | ведическая культура русов' ?>">
            <?
        }

    }
}