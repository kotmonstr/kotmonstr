<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use common\models\Comment;
use frontend\assets\AppAsset;
use app\components\CarouselWidget;

Yii::$app->formatter->locale = 'ru-RU';
//$this->registerJSFile('/js/custom/tooltip.js',['depends'=>AppAsset::className()]);
//$this->registerJSFile('/js/custom/zoom.js',['depends'=>AppAsset::className()]);

?>
<?= $this->render('@themes/vapor/views/layouts/parts/_blog-section',['model'=> $model,'pages'=>$pages,'pageSize'=> $pageSize]) ?>
<?= $this->render('@themes/vapor/views/layouts/parts/_below-blog') ?>
<?= isset($modelLastBlog) && $modelLastBlog != null ? $this->render('@themes/vapor/views/layouts/parts/_parts',['modelLastBlog'=> $modelLastBlog]) : NULL ?>

<div class="container">

 



        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h5>Свежие новости</h5>
            </div>
        </div>
        <div class="row">
        <?php foreach ($modelLastBlog as $blog): ?>
            <?php
            $image = $blog->image;
            if ($image == '') {
                $image = "/img-custom/default.jpg";
            }
            ?>
            <div class="col-sm-6 col-md-4">

                <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]); ?>">
                    <div class="thumbnail" style="height: 367px">
                        <img class="img-thumb" src="<?= $image ?>" alt="<?= StringHelper::truncate($blog->title, 190) ?>">
                        <div class="caption">
                            <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 90) ?></h5>
                        </div>
                        <div class="caption">
                            <span class="glyphicon glyphicon-time bold dark-color" aria-hidden="true"></span>
                            <span class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'long') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true" style="margin-left:10px"><?= $blog->view ?></span>
                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true" style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                        </div>
                    </div>
                </a>

            </div>
        <? endforeach; ?>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h5>Популярные</h5>
            </div>
        </div>
        <div class="row">
        <?php foreach ($modeMostWatched as $blog): ?>
            <?php
            $image = $blog->image;
            if ($image == '') {
                $image = "/img-custom/default.jpg";
            }
            ?>
            <div class="col-sm-6 col-md-4">
                <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]); ?>">
                    <div class="thumbnail" style="height: 367px">
                        <img class="img-thumb" src="<?= $image ?>" alt="<?= StringHelper::truncate($blog->title, 190) ?>">
                        <div class="caption">
                            <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 90) ?></h5>
                        </div>
                        <div class="caption">
                            <span class="glyphicon glyphicon-time bold dark-color" aria-hidden="true"></span>
                            <span class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'long') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true" style="margin-left:10px"><?= $blog->view ?></span>
                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true" style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                        </div>
                    </div>
                </a>
            </div>
        <? endforeach; ?>

        </div>
    </div>
</div>


<style>
    .new-conteiner {
        background: url(../img/newsletter-bg.png) 0 0 repeat;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 25px 27px 28px 28px;
        margin: 15px 10px 15px -10px;
    }

    .thumbnail {
        height: 380px;
        line-height: 16px;
        font-size: 14px;
        box-shadow: 1px 3px 8px #122;
    }

    .thumbnail:hover {

        background-color: #fff0ff !important;
    }

    .img-thumb {
        height: 256px !important;
    }

    .caption-header {
        font-size: 16px;
        color: #444;
        font-weight: 600;
        letter-spacing: -1px;
    }

    .dark-color {
        color: #444;
    }
</style>