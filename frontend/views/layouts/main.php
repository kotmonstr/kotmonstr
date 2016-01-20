<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\ImageSlider;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$model = ImageSlider::find()->where(['status'=>'0'])->all();
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
        <?php echo $this->render('parts/_pre_header') ?>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
<?php echo $this->render('parts/_header_no_slider') ?>
        <?php if($model): ?>
            <?php echo $this->render('parts/_slider', ['model' => $model]) ?>
        <?php endif; ?>
        <?= $content ?>
        <?php echo $this->render('parts/_footer') ?>
        <?php $this->endBody() ?>
    </body>  
</html>
        <?php $this->endPage() ?>
