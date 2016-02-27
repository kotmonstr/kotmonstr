<?php

use yii\helpers\Url;
use common\models\User;
use common\models\Comment;
use yii\helpers\StringHelper;
Yii::$app->formatter->locale = 'ru-RU';

$this->registerJsFile('/js/custom/comment.js',['depends'=> \backend\assets\AppAsset::className()]);
?>

<input type="hidden" id="comment_id" value="<?= $model->id ?>">

<section id="content">
    <div class="row">
        <div class="container">
            <div class="pos bg_preview_post">
                <center><h3><?= $model->title ?></h3></center>
                <center>
                <?php if($model->image ){ ?>
                <img alt="" src="<?= $model->image; ?>">
                <?php } ?>
                </center>
                <p class="content"><?= $model->content ?>  </p>
            </div>
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
    a, a:link, a:visited {
        color: #fff!important;

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
        // color : #ffffff !important;
        background-color: #fff !important;
        font-family: verdana;
    }
    h5{
        padding: 20px;
    }



    h3 {
        font-size: 28px;
        text-transform: uppercase;
        font-family: verdana;
        letter-spacing: -2px;
        color: #666;
    }




</style>
<style>
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
        // content : " ";
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
        // font-family : "solomon";
        font-size: 20px;
    }
    . p{
        background-color: #ffffff!important;
         }
    .content{
        font-size: 14px;
        font-family: "Verdana", "sans-serif";
        margin-top: 20px;
    }
</style>