<?php

use yii\helpers\Html;
use frontend\assets\ShopAsset;
use frontend\assets\AppAsset;
use common\models\Video;


AppAsset::register($this);
ShopAsset::register($this);

$modelYoutube = Video::getLastVideo(4);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php echo $this->render('parts_shop/_pre_header') ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php echo $this->render('parts_shop/_body') ?>
<?= $content ?>

<?php echo $this->render('parts_shop/_footer',['modelYoutube'=> $modelYoutube]) ?>





<?php
$Flashes=[];
$Flashes = Yii::$app->session->getAllFlashes();
if ($Flashes && !empty($Flashes) )
//TODO:  Сделать все по уму!!!!!
{ ?>

<div id="system_window2" class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">&nbsp</h4>
            </div>
            <div class="modal-body">
  <?php  foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
        echo $message;
    } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
    <?=
    $js = <<<JS
        $('#system_window2').modal('show');
JS;
$this->registerJs($js); ?>

<?php
}
?>







<?= $this->render('parts_shop/system_window'); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<style>
    .start_animation{
        /*width:100%;*/
        /*height:100%;*/
        /*position: absolute;*/
        border: 1px solid red;
        /*z-index: 9999999;*/
    }
</style>
