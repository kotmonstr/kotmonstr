<?php
//header('Content-type: application/rar');
use yii\helpers\Url;
use yii\helpers\Html;

$this->registerJsFile('/js/custom/download.js',['depends'=> \frontend\assets\AppAsset::className()]);
?>

<section id="content">
    <div class="sub-content">
        <div class="container book-shet">
            <center><h3>Книги</h3></center>
            <center>
                <div class="span12 shet">
                </div>
            </center>
            <div class="span12">

                <?php foreach ($model as $book): ?>
                    <div class="row">
                        <div class="col-md-1">
                            <?php if($book->image){ ?>
                            <?= Html::img('/upload/book-thumbs/' . $book->image, ['width' => '50px', 'height' => '50px']); ?>
                            <?php } else { ?>
                                <?= Html::img('/img-custom/default.jpg', ['width' => '50px', 'height' => '50px']); ?>
                            <?php } ?>
                        </div>
                        <div class="col-md-11">
                            <div onclick="Download(<?= $book->id ?>)" class='main-book'><a
                                    href="/book/<?= $book->eng_name; ?>">
                                    <div class='book'> <?= $book->name . '(' . $book->download . ')' ?> </div>
                                    <div class="download"></div>
                                </a></div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<style>
    .download {
        height: 40px;
        width: 215px;
        overflow: auto;
        background: url(/img-custom/download-befor.png) no-repeat;
        background-size: 10%;
    }

    .download:hover {
    / / margin-top : 5 px;
        height: 40px;
        width: 215px;
        overflow: auto;
        background: url(/img-custom/download-after.png) no-repeat;
        background-size: 10%;
    }

    .book {
        margin-right: 10px;
        float: left;
        font-size: 16px;
    }

    .book:hover {
    }

    .main-book {
        width: 300px;
    }

    .main-book:hover {
        margin-top: 1px;
    }

    .book-shet {
        min-height: 300px;
    }


</style>