<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use common\models\Comment;

Yii::$app->formatter->locale = 'ru-RU';
?>


<center><h3>Статьи</h3></center>
<div class="row">
    <div class="container">

        <table>
            <tr>
                <td class="td-left" valign="top">

                    <?php if($modelLastArticle): ?>
                    <div class="div-left-news pos">
                        <div class="title">
                            Последние:
                            <table style="margin-top: 10px">
                                <?php foreach ($modelLastArticle as $lastBlog): ?>
                                    <tr>
                                        <td class="left-img">
                                            <div class="img"><a
                                                    href="<?= Url::to(['/article/default/views','id'=> $lastBlog->id]); ?>"><img
                                                        alt="" src="<?=  ($lastBlog->image) ? $lastBlog->image :  "/img-custom/default.jpg"; ?>"></a></div>
                                        </td>
                                        <td class="right-text">
                                            <div class="title-mini"><a
                                                    href="<?= Url::to(['/article/default/views','id'=> $lastBlog->id]); ?>"><?= StringHelper::truncate($lastBlog->title, 27) ?></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($modeMostWatched): ?>
                    <div class="div-left-news pos">
                        <div class="title">
                            Популярные:
                            <table style="margin-top: 10px">
                                <?php foreach ($modeMostWatched as $MostBlog): ?>
                                    <tr>
                                        <td class="left-img">
                                            <div class="img"><a
                                                    href="<?= Url::to(['/article/default/views','id'=> $MostBlog->id]); ?>"><img
                                                        alt="" src="<?=  ($MostBlog->image) ? $MostBlog->image :  "/img-custom/default.jpg"; ?>"></a></div>
                                        </td>
                                        <td class="right-text">
                                            <div class="title-mini"><a
                                                    href="<?= Url::to(['/article/default/views','id'=> $MostBlog->id]); ?>"><?= StringHelper::truncate($MostBlog->title, 27) ?></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>
                        </div>
                    </div>
                    <?php endif; ?>
                </td>


                <td class="td-right" valign="top">
                    <?php foreach ($model as $blog): ?>

                        <div class="center" >
                            <?php
                            $image = $blog->image;
                            if ($image == '') {
                                $image = "/img-custom/default.jpg";
                            }
                            ?>

                            <div class="pos bg_preview_post">
                                <div class="hdash"></div>
                                <div class="preview_post">
                                    <div class="img"><a
                                            href="<?= Url::to(['/article/default/views', 'id' => $blog->id]); ?>"><img
                                                alt="" src="<?= $image ?>"></a></div>
                                    <div class="txt">
                                        <div class="title"><a
                                                href="<?= Url::to(['/article/default/views', 'id' => $blog->id]); ?>"><?= StringHelper::truncate($blog->title, 70) ?></a>
                                        </div>
                                        <div class="partition">

                                        </div>
                                        <div class="text">
                                            <h5><?= strip_tags(StringHelper::truncate($blog->content, 700)); ?></h5>
                                        </div>
                                        <div class="bottom">
                                            <div class="fleft">
                                                  <span style="margin-left:5px;" time="<?= $blog->created_at ?>"
                                                        class="time update_local_time">
                                        <span class="glyphicon glyphicon-time bold" aria-hidden="true"></span>
                                                      <?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'long') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>

                                    <span class="post_view">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                              style="margin-left:10px">

                                        </span><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px">
                                              <?php if (Comment::getMessagesQuantityByBlogId($blog->id)): ?>
                                        </span>
                                                <?= Comment::getMessagesQuantityByBlogId($blog->id); ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
        <center>
            <?=
            LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </center>
    </div>
</div>


<style>

    .bg_preview_post {
        background: none repeat scroll 0 0 #f1f1e6;
        margin-bottom: 20px;
        padding: 10px;
    }

    .hdash {
        display: block;
        height: 100%;
        left: 100%;
        margin-left: 14px;
        position: absolute;
        top: 0;
        width: 1px;
    }

    .bg_preview_post .preview_post {
        margin-bottom: 0;
    }

    .preview_post {
        margin-bottom: 20px;
        overflow: hidden;
        position: relative;
    }

    .bg_preview_post .preview_post .img {
        width: 280px;
    }

    .preview_post .img {
        border: 1px solid #bbbbbb;
        float: left;
        width: 340px;
    }

    a, a:link, a:visited {
        color: #cc0000;
        text-decoration: none;
    }

    a, a:link, a:visited {
        color: #cc0000;
        text-decoration: none;

    }

    .bg_preview_post .preview_post .txt {
        margin-left: 310px;
    }

    .preview_post .txt {
        margin-left: 375px;
    }

    .preview_post .txt .title {
        border-bottom: 2px solid #e1e1e1;
        line-height: 30px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        padding-top: 2px;
    }

    .preview_post .txt .partition {
        font-family: "solomon_semibold";
        margin-bottom: 20px;
    }

    .preview_post .txt .text {
        color: #000 !important;;
        font-family: "Open Sans", sans-serif;
        font-size: 20px;
        line-height: 28px;
        margin-bottom: 25px;
        text-align: justify;
        padding: 0px 20px 0px 0px;
    }

    .bg_preview_post .preview_post .bottom {
        bottom: 0;
        left: 310px;
        overflow: hidden;
        padding-left: 1px;
        position: absolute;
        width: 610px;
    }

    .preview_post .bottom {
        bottom: 0;
        left: 375px;
        overflow: hidden;
        position: absolute;
        width: 565px;
    }

    .post_list {
        color: #666;
        font-family: "solomon";
        font-size: 14px;
        background-color: #E9E9E9;
    }

    .clearfix:after, .group:after {
        clear: both;
    / / content : " ";
        display: block;
        font-size: 0;
        height: 0;
        line-height: 0;
        visibility: hidden;
    }

    .pos {
        border-radius: 4px;
        box-shadow: 5px 5px 10px #000;
    }

    .title {
    / / font-family : "solomon";
        font-size: 20px;
    }

    .td-left {
        width: 300px;
    / / border : 1 px solid red !important;
    }

    .td-right {
        padding-left: 10px;
    }

    .div-left-news {
        display: block;
    / / border : 1 px dotted blue;
        padding: 20px;
        background-color: #F1F1E6;
        min-height: 100px;
        margin-bottom: 10px;
    }

    .left-img {
        width: 38px;
        height: 50px;
        /* border: 1px solid red; */
        padding: 2px;
    }
    .title-mini a{
        font-size: 14px!important;
    }
    }
</style>
