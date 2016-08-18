<?php
//vd($this->context->meta);
use yii\helpers\Html;
use frontend\assets\AppAsset;
use app\components\SeoHelper;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= SeoHelper::getMeta(isset($this->context->meta) ? $this->context->meta : null); ?>
        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php echo $this->render('parts/_header_no_slider') ?>
        <?= $content ?>
         <?php echo $this->render('parts/_footer_empty') ?>
        <?php $this->endBody() ?>
    </body>  
</html>
<?php $this->endPage() ?>
