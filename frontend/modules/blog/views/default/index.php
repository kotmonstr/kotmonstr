<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use common\models\Comment;
use frontend\assets\AppAsset;

Yii::$app->formatter->locale = 'ru-RU';
//$this->registerJSFile('/js/custom/tooltip.js',['depends'=>AppAsset::className()]);

?>


<div class="container">

    <div class="new-conteiner">
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <h3>Новости</h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($model as $blog): ?>
            <?php
            $image = $blog->image;
            if ($image == '') {
                $image = "/img-custom/default.jpg";
            }
            ?>

            <div class="col-sm-6 col-md-4">
                <a href="<?= Url::to(['/blog/default/views', 'id' => $blog->id]); ?>">
                    <div class="thumbnail" >
                        <img class="img-thumb" src="<?= $image ?>" alt="...">

                        <div class="caption">
                            <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
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

                <a href="<?= Url::to(['/blog/default/views', 'id' => $blog->id]); ?>">
                    <div class="thumbnail">
                        <img class="img-thumb" src="<?= $image ?>" alt="...">
                        <div class="caption">
                            <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
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
                <a href="<?= Url::to(['/blog/default/views', 'id' => $blog->id]); ?>">
                    <div class="thumbnail">
                        <img class="img-thumb" src="<?= $image ?>" alt="...">
                        <div class="caption">
                            <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
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
        <div class="col-sm-12" style="text-align: center">
            <?=
            LinkPager::widget([
                'pagination' => $pages,
                'maxButtonCount' => 5,
            ]);
            ?>
            <ul class="pagination">
                <li class="last"><a href="/blog/default/index?page=<?= ceil($pages->totalCount / $pageSize) ?>"
                                    data-page="<?= ceil($pages->totalCount / $pageSize) ?>"><?= '...' . ceil($pages->totalCount / $pageSize); ?></a>
                </li>
            </ul>
        </div>
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