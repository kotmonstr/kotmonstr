<?php 
use yii\helpers\Html;
?>
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
</style>


