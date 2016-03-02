<?php

use yii\helpers\Html;
use app\components\SliderWidget;
use frontend\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('parts/_header_no_slider') ?>
<?= SliderWidget::widget(['source' => 'photo']); ?>
<?= $content ?>
<?php echo $this->render('parts/_footer') ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
