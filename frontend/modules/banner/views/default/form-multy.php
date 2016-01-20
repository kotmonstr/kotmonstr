<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$model = new \common\models\ImageSlider;

use backend\assets\AppAsset;

$this->registerJsFile('/js/custom/upload-multy.js', ['depends' => AppAsset::className()]);
?>
<div id="content">

    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="video-categoria-index">
                    <?php
                    $form = ActiveForm::begin([
                                'action' => ['/image/submit'],
                                'options' => ['enctype' => 'multipart/form-data'],
                                'id' => 'form-send-file']);
                    ?>
                    <?= $form->field($model, 'file[]')->fileInput(['class' => 'send-file', 'multiple' => true]) ?>
                    <? //= Html::submitButton('Загрузить', ['class' => 'btn btn-success send-file-submit' ]) ?>
                    <?= Html::Button('Загрузить', ['class' => 'btn btn-success send-file-submit', 'onclick' => 'sendfile()']) ?>
                    <?php ActiveForm::end(); ?>

                </div>	
            </div>	
        </div>	
    </div>	


    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body photo-target">
                <?php foreach ($_model as $photo): ?>

                    <div class="thumb" style="float:left;padding: 2px" data-name="<?= $photo->name ?>" onclick="ShowFullImage('<?= $photo->name ?>')" >
                        <div>
                            <?= Html::img('/upload/multy-thumbs/' . $photo->name, ['height' => '70px']); ?>
                        </div>
                        <div style="" >
                            <?= $photo->name; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="photo-preview" >
    <div id="image-inside">
    </div>
    <span onclick="HideFullImage()" class="glyphicon glyphicon-remove red-x" aria-hidden="true"></span>
</div>
<style>
    .jpreloader.back_background{
        background-color: #111214;
        bottom: 0;
        height: 100%;
        left: 0;
        opacity: 0.9;
        position: fixed;
        right: 0;
        top: 0;
        width: 100%;    
        display: block;  
        background-image: url("/img/preloader.gif");
        background-repeat: no-repeat;
        background-position:center center;
    }
    .photo-preview{
        display:none;
        background-color: #999;
        //bottom: 40%;

        left: 30%;

        position: fixed;
        right: 40%;
        top: 15%;
        min-width: 800px;    
        //min-height: 600px;    
        padding:10px;

    }
    .active{      
        display: block;      
    }

    .glyphicon{
        position: absolute;
        top: 6px;
        right: 6px;
        display: inline-block;
        color: #b52b27;


    }
    .glyphicon:hover{
        position: absolute;
        top: 6px;
        right: 6px;
        display: inline-block;
        color: red;
        z-index: 999;
    }
    .btn-delete-image {

        position: absolute;
        right: 14px;
        bottom: 16px;
    } 
</style>


