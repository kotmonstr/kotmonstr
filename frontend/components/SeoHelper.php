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
            <title><?= Html::encode($arr->title); ?></title>
            <meta name="description"
                  content="<?= Html::encode(StringHelper::truncate(isset($arr->content) ? $arr->content : $arr->title,200)) ?>">
            <meta name="keywords"
                  content="Мужской, мужской сайт, мужчина, мужские новости , мужские гаджеты , советы мужчинам, книги для мужчин , мужские новости, бабы - дуры">
        <? }else{
            $module = Yii::$app->controller->module->id;
            $controller = Yii::$app->controller->id;
            $action = Yii::$app->controller->action->id;
            $url = $module .'/'. $controller . '/' . $action;
            $meta = Seo::getPageMeta($url);
            //vd($meta);
            ?>
            <title><?= $meta ? Html::encode($meta->title) : 'kotmonstr.com' ?></title>
            <meta name="description"
                  content="<?= is_object($meta) ? Html::encode($meta->description) : 'kotmonstr.com - мужской сайт' ?>">
            <meta name="keywords"
                  content="<?= is_object($meta) ? Html::encode($meta->keywords) : 'kotmonstr.com - мужской сайт, мужской блог' ?>">
            <?
        }

    }
}