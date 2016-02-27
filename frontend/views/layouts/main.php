<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use app\components\SliderWidget;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
<?php echo $this->render('parts/_header_no_slider') ?>
        <?= SliderWidget::widget(); ?>
        <?= $content ?>
        <?php echo $this->render('parts/_footer') ?>
        <?php $this->endBody() ?>
    </body>  
</html>
        <?php $this->endPage() ?>
