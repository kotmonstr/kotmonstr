<?php

use yii\helpers\Url;
use common\models\User;
use common\models\Comment;
use yii\helpers\StringHelper;
use app\components\TemplateWidget;
use kartik\rating\StarRating;
use yii\web\JsExpression;
Yii::$app->formatter->locale = 'ru-RU';
$this->registerJsFile('/js/custom/comment.js', ['depends' => \backend\assets\AppAsset::className()]);


?>


<div class="container" style="text-align: center; padding: 0px 35px">
    <div class="row pos bg_preview_post">


        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <input type="hidden" id="comment_id" value="<?= $model->id ?>">
                <h3><?= $model->title ?></h3>
            </div>
        </div>

   


        <?= TemplateWidget::widget(['model' => $model]); ?>


        <div class="row">
            <div class="col-md-12" style="padding-right: 0px;padding-left: 20px;">
                <hr>
            </div>
            <div class="col-md-9" style="text-align: right">
    <span class="pull-left">
                          
                                    </span>
                <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"
                        charset="utf-8"></script>
                <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,twitter"></div>
            </div>
            <div class="col-md-3" style="text-align: right">


                                    <span class="glyphicon glyphicon-time bold dark-color" aria-hidden="true">
                                    </span>
                                    <span class="dark-color">
                                        <?= ' ' . Yii::$app->formatter->asDate($model->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($model->created_at, 'short') ?>
                                    </span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px">&nbsp;<?= $model->view ?>
                                    </span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true" style="margin-left:10px">&nbsp;<?= Comment::getMessagesQuantityByBlogId($model->id) ?>
                                    </span>
            </div>
        </div>


    </div>


    <div class="container" style="text-align: center;padding: 6px 70px 0px 0px;margin: 0px 1px 0px 0px;">

            <section id="comment">


                <center><h5>Коментарии</h5></center>

                <? if($coment_model && $coment_model != ''): ?>
                <?php foreach ($coment_model as $model): ?>


                    <div class="row target main-comment pos bg_preview_post">
                        <div class="span2" style="text-align: center">
                            <?= $model->social == 0 ? User::getAvatar($model->author_id) : User::getAvatarSocial($model->social_avatar) ?><br>

                            <div class="com-name"><?= $model->social == 1  ? $model->social_name : $model->author->username ?></div>
                        </div>

                        <div class="span6" title="<?= $model->content ?>">
                            <?= StringHelper::truncate($model->content, 1000); ?>
                        </div>
                        <div class="span2 time-d">
                            <?= Yii::$app->formatter->asDate($model->created_at, 'long'); ?>
                            <br><?= date("H:i", $model->created_at) ?>
                        </div>
                    </div>

                <?php endforeach; ?>
                <?php endif; ?>

            </section>

    </div>


<?php if (!Yii::$app->user->isGuest): ?>
    <section id="form">
        <div class="container shet" style="margin-top:50px">
            <div class="row">

                    <div class="span8 left-div">
                        <textarea id="comment-textarea"></textarea>
                    </div>
                    <div class="span4">
                        <a onclick="Comment.AddComment()" href="javascript:void(0);" class="btn btn_ sub-btn">Добавить
                            комментарий</a>
                    </div>
                </div>

        </div>
    </section>
<?php endif; ?>


</div>











<style>
    .rating-md {
        margin-left: 20px;
        font-size: 2.13em;
    }
    .text {
        font-size: 14px;
        font-family: "Verdana", "sans-serif";
    }

    .sub-btn {
        margin-left: 0px !important;
    }

    #comment-textarea {
        width: 885px;
        height: 120px;
        margin-left: 16px;
    }

    .left-div {
        margin: 0px;
    }

    a, a:link, a:visited {
        //color: #fff !important;

    }

    .com-name {
        font-size: 14px;
        font-weight: bold;
    }

    .main-comment {
    / / border: 1 px solid red;
        padding: 5px 0px;
        margin-bottom: 10px;
    }

    .time-d {
        text-align: center;
        vertical-align: middle;
        margin-top: 23px;
    }

    p {
    / / color: #ffffff !important;
        //background-color: #fff !important;
        font-family: verdana;
    }

    h5 {
        padding: 20px;
    }

    h3 {
        font-size: 28px;
        text-transform: uppercase;
        font-family: verdana;
        letter-spacing: -2px;
        color: #666;
    }
    .bg_preview_post {
        background: none repeat scroll 0 0 #ffffff;
        margin-bottom: 20px;
        padding: 20px;
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
        //color: #cc0000;
        //text-decoration: none;
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
    / / content: " ";
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
    / / font-family: "solomon";
        font-size: 20px;
    }

    p {
        font-size: 16px;
        font-family: "Verdana", "sans-serif";
        text-align: justify;
    }

    .content {
        font-size: 14px;
        font-family: "Verdana", "sans-serif";
        margin-top: 20px;
    }
</style>