<?php

use yii\helpers\Html;
use frontend\assets\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php echo $this->render('parts_adminka/_pre_header') ?>
        <?php $this->head() ?>
    </head>
    <body>
        <div class="layout"></div>
        <div class="bg-dark" id="wrap" style="min-height:1000px">
            <?php $this->beginBody() ?>

            <?php echo $this->render('parts_adminka/_header') ?>
            <?php echo $this->render('parts_adminka/_sidebar') ?>

            <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message) { ?>
            
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;opacity: 1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('.modal').hide();$('.layout').hide()"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Системное сообщение</h4>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                <p style="color:#000"><?php echo    $message ; ?></p>
                            </div>
                            <div class="modal-footer">

                             
                                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="$('#myModal2').remove();$('.layout').hide()">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php } ?>
            <?= $content ?>

            <?php echo $this->render('parts_adminka/_footer') ?>
<?php $this->endBody() ?>
        </div>   
    </body>  
</html>
<?php $this->endPage() ?>
