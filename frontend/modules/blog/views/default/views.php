<?php

use yii\helpers\Url;
use common\models\User;
use common\models\Comment;
use yii\helpers\StringHelper;
use app\components\TemplateWidget;
//vd($model);
Yii::$app->formatter->locale = 'ru-RU';

$this->registerJsFile('/js/custom/comment.js',['depends'=>\backend\assets\AppAsset::className()]);
?>

<input type="hidden" id="comment_id" value="<?= $model->id ?>">

<section id="content">
    <div class="container" style="text-align: center; padding: 5px 35px">
        <div class="row pos bg_preview_post">


            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <input type="hidden" id="comment_id" value="<?= $model->id ?>">
                    <p class="header-title"><?= $model->title ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1" style="">
                    <? if($prevBlog): ?>
                    <a href="<?= Url::to(['/blog/list/'.$prevBlog]) ?>" title="Предыдущая новость">
                        <div class="arrow-left"></div>


                    </a>
                    <? endif; ?>
                </div>
                <div class="col-md-10 " style="padding: 0px 45px">
                    <img src="<?= $model->image ?>" width="auto" alt="">
                </div>
                <div class="col-md-1" >
                    <? if($nextBlog): ?>
                    <a href="<?= Url::to(['/blog/list/'.$nextBlog]) ?>" title="Следующая новость">
                        <div class="arrow-right"></div>


                    </a>
                    <? endif; ?>
                </div>
            </div>

            <div class="row">
            <?= TemplateWidget::widget(['model' => $model,'template'=> 4]); ?>
            </div>

            <div class="row">
                <div class="col-md-12" style="">
                    <hr>
                </div>
                <div class="col-md-9" style="text-align: right">

                    <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"
                            charset="utf-8"></script>
                    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,twitter"></div>
                </div>
                <div class="col-md-3" style="text-align: right">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($model->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($model->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px">&nbsp;<?= $model->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px">&nbsp;<?= Comment::getMessagesQuantityByBlogId($model->id) ?></span>
                </div>
            </div>


        </div>
</section>

<section id="comment">


    <center><h5>Коментарии</h5></center>


    <?php foreach ($coment_model as $model): ?>
        <div class="row-fluid ">
            <div class="container">
                <div class="span12 target main-comment pos bg_preview_post">
                    <div class="span2" style="text-align: center">
                        <?= User::getAvatar($model->author_id) ?><br>
                        <div class="com-name"><?= $model->author->username ?></div>
                    </div>

                    <div class="span8" title="<?= $model->content?>">
                        <?= StringHelper::truncate($model->content,1000); ?>
                    </div>
                    <div class="span2 time-d">

                        <?= Yii::$app->formatter->asDate($model->created_at, 'long'); ?><br><?= date("H:i",$model->created_at) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</section>
<?php if(!Yii::$app->user->isGuest):?>
<section id="form">
    <div class="container shet" style="margin-top:50px">
        <div class="row">
            <div class="span12">
            <div class="span10 left-div">
                <textarea id="comment-textarea"></textarea>
            </div>
            <div class="span2">
                <a onclick="Comment.AddComment()" href="javascript:void(0);" class="btn btn_ sub-btn">Добавить комментарий</a>
            </div>
            </div>

        </div>
    </div>
</section>
<?php endif ?>
<style>
.header-title{
    font-size: 22px;
    font-weight: bold;
    letter-spacing: -2px;
}
    .arrow-left{
        width:25px;
        height:25px;
        background-image: url('/img/arrows/left-tiny.png'); none repeat center center;
        position: absolute;
        top: 150px;
        left: 83px;
        z-index: 2;
    }
    .arrow-left:hover{
        background-image: url('/img/arrows/left-active-tiny.png'); none repeat center center;
    }
    .arrow-right{
        width:25px;
        height:25px;
        background-image: url('/img/arrows/right-tiny.png'); none repeat center center;
        position: absolute;
        top: 150px;
        right: 83px;
        z-index: 2;
    }
    .arrow-right:hover{
        background-image: url('/img/arrows/right-active-tiny.png'); none repeat center center;
    }

    .btn-left-right{
        margin: auto 0px;
    }
    .sub-btn{
        margin-left: 0px!important;
    }

   #comment-textarea {
        width: 885px;
        height: 120px;
       margin-left: 16px;
    }
    .left-div{
        margin: 0px;
    }
    .com-name{
        font-size: 14px;
        font-weight: bold;
    }
    .main-comment{
        //border: 1px solid red;
        padding: 5px 0px;
        margin-bottom: 10px;
    }
    .time-d{
        text-align: center;
vertical-align: middle;
margin-top: 23px;
    }
    p {

        font-family: verdana;
    }
    .bg_preview_post {
        padding: 20px 20px 20px 40px!important;
    }


    h3,h4,h5 {
        font-size: 18px;
        text-transform: uppercase;
        font-family: verdana;
        //letter-spacing: -2px;
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



    .title {
        // font-family : "solomon";
        font-size: 20px;
    }
    .text{
        font-size: 16px;
        font-family: "Verdana", "sans-serif";
        text-align: justify;
         }
    .content{
        font-size: 14px;
        font-family: "Verdana", "sans-serif";
       // margin-top: 20px;
    }
</style>