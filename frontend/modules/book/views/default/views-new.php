<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->registerJsFile('/js/custom/download.js', ['depends' => \frontend\assets\AppAsset::className()]);
?>
<div class="container" style="padding: 0px 35px">
    <div class="row pos bg_preview_post">

        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h3>Книги22</h3>
            </div>
        </div>


        <div class="row">

            <? if ($model): ?>
                <?php foreach ($model as $book): ?>

                    <div class="span3">
                        <?= Html::img('/upload/book-thumbs/' . $book->image, ['width' => '50px']); ?>
                        <?= $book->image ?>
                    </div>

                    <div class="span3">

                        <a href="<?= 'book/'.$book->eng_name; ?>"> <?= $book->name ?></a>



                    </div>

                    <div class="span3">
                        <?= $book->file ?>
                    </div>

                    <div class="span3">
                        <?= $book->download ?>
                    </div>


                <?php endforeach; ?>
            <? endif ?>
        </div>
    </div>
</div>
<style>
    .span3{
        height: 100px!important;
    }
</style>
