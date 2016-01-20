<?php

use yii\helpers\Url;
use common\models\VideoCategoria;
use common\models\Author;

$model_author = Author::find()->all();
$url = Yii::$app->controller->module->id . '/' . Yii::$app->controller->action->id;
$module = Yii::$app->controller->module->id;
$file_avatar = Yii::getAlias('@frontend').'/web/upload/user/'.Yii::$app->user->id.'/avatar/avatar.jpg';
//vd($url);
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="header-block clearfix">
                <div class="clearfix header-block-pad">

                    <a href="<?= Url::to('/site/index') ?>"><h1 class="logo"><span class="red">Kot</span>monstr</h1></a><a href="<?= Url::to('/shop/index') ?>"><span>Магазин</span></a>
                    <form id="search-form" action="<?= Url::to('/search/show-item');?>" method="GET" accept-charset="utf-8" class="navbar-form" >
                        <input type="text" name="item" onBlur="if (this.value == '')
                                    this.value = ''" onFocus="if (this.value == '')
                                                this.value = ''"  >
                        <a href="javascript:void(0);" onClick="document.getElementById('search-form').submit()"></a>
                    </form>
                    <?php if (file_exists($file_avatar)) { ?>
                        <a href="<?= Url::to('/profile/form'); ?>"><div id="custom-avatar" class="contacts" style=" background: url('/upload/user/<?= Yii::$app->user->id ?>/avatar/avatar.jpg') no-repeat;background-size:100%">
                    <?php }else{?>
                        <a href="<?= Url::to('/profile/form'); ?>"><div id="avatar" class="contacts" >       
                    <?php } ?>        
                    </div></a>
                    <span class="contacts"><?php
                        if (!Yii::$app->user->isGuest) {
                            echo Yii::$app->user->identity->username;
                        }
                        ?>
                    </span>

                </div>
                <div class="navbar navbar_ clearfix muu" style="">
                    <div class="navbar-inner navbar-inner_">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Меню</a>                                                   
                            <div class="nav-collapse nav-collapse_ " >
                                <ul class="nav sf-menu">
                                    <li class="li-first <?php
                                    if ($url == 'site/index') {
                                        echo"active";
                                    }
                                    ?>"><a href="<?= Url::to('/site/default/index') ?>"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                    <li class="sub-menu <?php
                                    if ($url == 'video/show-author') {
                                        echo"active";
                                    }
                                    ?>"><a href="javascript:void(0);">Авторы</a>
                                        <ul>
                                            <?php foreach ($model_author as $author): ?>
                                                <li><a href="<?= Url::to(['/video/show-author', 'id' => $author->id]) ?>"><?= $author->name ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li class="sub-menu <?php
                                    if ($url == 'video/view') {
                                        echo"active";
                                    }
                                    ?>"><a href="javascript:void(0);">Видео</a>
                                        <ul>
                                            <?php foreach (VideoCategoria::getModel() as $categoria): ?>
                                                <li><a href="<?= Url::to(['/video/view', 'categoria_id' => $categoria->id]); ?>"><?= $categoria->name ?></a></li>                                         
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li class="sub-menu <?php
                                    if ($url == 'video/tv24' || $url == 'video/tv1' || $url == 'video/5canal') {
                                        echo"active";
                                    }
                                    ?>"><a href="javascript:void(0);">ТВ</a>
                                        <ul>
                                            <li><a href="<?= Url::to('/video/tv24') ?>">РОССИЯ 24</a></li>
                                            <li><a href="<?= Url::to('/video/tv1') ?>">РОССИЯ 1</a></li>
                                            <li><a href="<?= Url::to('/video/5canal') ?>">5 КАНАЛ'</a></li>
                                        </ul>
                                    </li>



<!--                                    <li><a href="--><?//= Url::to('/rss/index') ?><!--">Новости RSS</a></li>-->
                                    <li class="<?php
                                    if ($url == 'rss/index') {
                                        echo"active";
                                    }
                                    ?>"><a href="<?= Url::to('/image/preview'); ?>" >Фотографии</a></li>

                                    <li class="<?php
                                    if ($url == 'blog/index' || $url == 'blog/view') {
                                        echo"active";
                                    }
                                    ?>"><a href="<?= Url::to('/blog/index') ?>">Новости</a></li>
                                    <li class="<?php
                                    if ($url == 'music/show') {
                                        echo"active";
                                    }
                                    ?>"><a href="<?= Url::to('/music/show') ?>">Музыка</a></li>

                                    <li><a href="<?= Url::to('/book/views') ?>">Книги</a></li>
                                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == 1 || !Yii::$app->user->isGuest && Yii::$app->user->id == 2 || !Yii::$app->user->isGuest && Yii::$app->user->id == 3) { ?><li><a href="<?= Url::to('/admin/index') ?>">Админка</a></li><?php } ?>
                                    <?php if (Yii::$app->user->isGuest) { ?>
                                        <li><a href="<?= Url::to('/site/signup') ?>">Регистрация</a></li>
                                        <li><a href="<?= Url::to('/site/login') ?>">Вход</a></li>
                                    <?php } else { ?>
                                        <li><a href="<?= Url::to('/site/logout') ?>">Выход</a>
                                        <?php } ?>
                                </ul>
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><img src="/img/icon-1.png" alt=""></a></li>
                                <li><a href="#"><img src="/img/icon-2.png" alt=""></a></li>
                                <li><a href="#"><img src="/img/icon-3.png" alt=""></a></li>
                                <li><a href="#"><img src="/img/icon-4.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>   
</div>


<style>

    .logo{
        font-family: 'Kaushan Script', cursive;
        font-size: 50px;

    }
    .red{
        color:#CF3046;
    }
    #avatar{
        background: url('/img-custom/avatar-default.jpg') no-repeat top center;
        width: 12%;
        height: 51%;
        position: absolute;
        background-position: 47% 30%;
        top: 1px;
        right: -28px;
        zoom: 52%;
        opacity: 0.4;
        cursor: pointer;
    }
    #custom-avatar{
       background-size: 100% 100%;
        width: 100px;
        height: 150px;
        position: absolute;
      
        top: 1px;
        right: -28px;
        //zoom: 52%;
        opacity: 0.4;
        cursor: pointer;
    }
    .navbar-form input {
        background: none;
        border: none;
        box-shadow: none;
        line-height: 18px;
        width: 220px;
        float: left;
        margin: 0px;
        padding-top: 18px;
        padding-bottom: 5px;
        font-size: 13px;
        /* font-weight: bold; */
    }
    form#newsletter a.btn_{
        font-size: 10px;
    }

</style>


