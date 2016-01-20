<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Photo;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
  $model = Photo::find()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
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
        <?php echo $this->render('parts/_slider-photo',['model'=>$model]) ?>
        <?php endif;?>
        <?= $content ?>
         <?php echo $this->render('parts/_footer') ?>
        <?php $this->endBody() ?>
    </body>  
</html>
<?php $this->endPage() ?>
