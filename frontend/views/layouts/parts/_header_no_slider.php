<?php

use yii\helpers\Url;

use frontend\assets\AppAsset;

//$this->registerJsFile('/js/custom/social.js', ['depends' => AppAsset::className()]);
$file_avatar = Yii::getAlias('@frontend').'/web/upload/user/'.Yii::$app->user->id.'/avatar/avatar.jpg';
//vd($url);
?>
<?php
if (Yii::$app->getSession()->hasFlash('error')) {
    echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
}

$identity = Yii::$app->getUser()->getIdentity();
?>

<div class="container">
    <div class="row">
        <div class="span12">
            <div class="header-block clearfix">
                <div class="clearfix header-block-pad">
                    <a href="<?= Url::to('/') ?>">
                    <div class="logo-img"></div></a>
                   <!-- <a href="<?= Url::to('/') ?>"><h1 class="logo"><span class="red">Kot</span>monstr</h1></a><a href="<?= Url::to('/shop/index') ?>"><span>Магазин</span></a> -->
                    <form id="search-form" action="<?= Url::to('/search/show-item');?>" method="GET" accept-charset="utf-8" class="navbar-form" >
                        <input type="text" name="item" onBlur="if (this.value == '')
                                    this.value = ''" onFocus="if (this.value == '')
                                                this.value = ''"  >
                        <a href="javascript:void(0);" onClick="document.getElementById('search-form').submit()"></a>
                    </form>
                    <?php if (file_exists($file_avatar)) { ?>
                        <a href="<?= Url::to('/profile/form'); ?>">
                            <div id="custom-avatar" class="contacts" style=" background: url('/upload/user/<?= Yii::$app->user->id ?>/avatar/avatar.jpg') no-repeat;background-size:100%"></div></a>
                    <?php }else{?>
                                <?php  if (isset($identity->profile)) { ?>
                                    <div id="custom-avatar" class="contacts" style="background: url(<?= $identity->profile['photo_big']?>) no-repeat;background-size:100%"></div>
                               <?php }else{ ?>
                                     <a href="<?= Url::to('/profile/form'); ?>"><div id="avatar" class="contacts" ></div></a>
                                    <?php  } ?>
                    <?php } ?>
                    <span class="contacts"><?php
                        if (!Yii::$app->user->isGuest) {
                            echo Yii::$app->user->identity->username;
                        }
                        ?>
                    </span>
                </div>
                <div class="navbar navbar_ clearfix muu" >
                    <div class="navbar-inner navbar-inner_">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Меню</a>                                                   
                            <div class="nav-collapse nav-collapse_ " >
                                <?= $this->render('@frontend/views/layouts/parts/menu') ?>
                            </div>
                            <ul class="social-icons">
                                <li><a href="/site/login?service=vkontakte" ><img src="/img/icon-1.png" alt=""></a></li>
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


