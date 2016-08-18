<?php
//header('Content-type: application/rar');
use yii\helpers\Url;
use yii\helpers\Html;

$this->registerJsFile('/js/custom/download.js', ['depends' => \frontend\assets\AppAsset::className()]);
?>

<section id="content">


    <div class="container">
        <div class="row" style="text-align: center">
            <h3>Книги</h3>
        </div>

        <div class="row">

            <? if ($model): ?>
                <?php foreach ($model as $book): ?>

                    <div class="span6" style="    text-align: right !important;">
                        <?php if ($book->image) { ?>
                            <?= Html::img('/upload/book-thumbs/' . $book->image, ['width' => '50px','class'=>'book-image']); ?>
                        <?php } else { ?>
                            <?= Html::img('/img-custom/default.jpg', ['width' => '50px']); ?>
                        <?php } ?>
                    </div>

                    <div class="span6" style="    text-align: left !important;">
                        <a title="скачать" href="/book/<?= $book->eng_name; ?>">
                            <span onclick="Download(<?= $book->id ?>)" class='main-book'>
                                     <?= $book->name . ' (' . $book->download . ')' ?>
                            </span>
                        </a>
                    </div>



                <?php endforeach; ?>
            <? endif ?>
        </div>
    </div>


</section>
<style>
    img{
        height: none!important;
    }
.book-image{
    height: 70px!important;
}
    .book {
        margin-right: 10px;
        float: left;
        font-size: 16px;
    }

    .book:hover {
    }

    .main-book {
        text-align: center !important;

    }

    .main-book:hover {
        margin-top: 1px;
    }

    .book-shet {
        min-height: 300px;
    }

    .span6 {
        height: 100px !important;

        line-height: 95px;
        //border: 1px solid red;
    }

</style>