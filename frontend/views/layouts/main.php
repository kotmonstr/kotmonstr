<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use app\components\SliderWidget;
use common\models\Seo;
use app\components\SeoHelper;
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

        <?= SeoHelper::getMeta(); ?>
        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
<?= $this->render('parts/_header_no_slider') ?>
        <?= SliderWidget::widget(['source'=>'slider']); ?>
        <?= $content ?>
        <?php echo $this->render('parts/_footer') ?>
        <?php $this->endBody() ?>
    </body>  
</html>
        <?php $this->endPage() ?>
