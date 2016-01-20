<?php
use yii\helpers\Url;
$ModuleShop = Yii::$app->getModule('shop');
$Path=$ModuleShop->GetPath();
//vd($Path);
?>
<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 first-left">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +7 978 898 2650</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> kotmonstr@ukr.net</a></li>
                            <li><a href="#"><i class="fa fa-compass"></i> Ваш Ip: <?= Yii::$app->request->userIP ?></a></li>
                            <li><a href="#"><i class="fa fa-user"></i><?= !Yii::$app->user->isGuest ? Yii::$app->user->identity->username : null ?></a></li>
                            <?php if (isset($USD)): ?>
                                <li><a href="#"><i class="fa fa-book"></i> USD:<?= ' '.substr($USD,0,-2); ?></a></li><?php endif; ?>
                            <?php if (isset($EUR)): ?>
                                <li><a href="#"><i class="fa fa-book"></i> UER:<?= ' '.substr($EUR,0,-2); ?></a></li><?php endif; ?>
                            <?php if (isset($UKR)): ?>
                                <li><a href="#"><i class="fa fa-book"></i> UKR:<?= ' '.substr($UKR,0,-3); ?></a></li><?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo pull-left">
                        <a href="<?= Url::to('/shop/index') ?>"><img src="/eshop/images/home/logo3.png" alt=""/></a>
                    </div>
                </div>

                <div class="col-sm-8">
                <ul id="menu-top" class="nav nav-tabs shop-menu ">
<!--                    <li role="presentation" class="--><?php //if($Path =='shop/default/index'){ echo'active';} ?><!--"><a href="--><?//= Url::to('/shop/index'); ?><!--"><i class="fa fa-home"> Главная</i></a></li>-->
<!--                    <li role="presentation" class="--><?php //if($Path =='shop/default/3'){ echo'active';} ?><!--"><a href="#"><i class="fa fa-user"> Accaunt</i></a></li>-->
                    <li role="presentation" class="<?php if($Path =='shop/default/wishlist'){ echo'active';} ?>"><a href="<?= Url::to('/shop/wishlist'); ?>"><i class="fa fa-star"> Список желаний <span id="wishlist"> <?= $quantityWishlist ?></span></i></a></li>
                    <li role="presentation" class="<?php if($Path =='shop/default/comparelist'){ echo'active';} ?>"><a href="<?= Url::to('/shop/comparelist'); ?>"><i class="fa fa-list"> Список сравнения <span id="comparelist"><?= $quantityCompareList ?></span></i></a></li>
                    <li role="presentation" class="<?php if($Path =='shop/default/order'){ echo'active';} ?>"><a href="<?= Url::to('/shop/order'); ?>"><i class="fa fa-crosshairs"> Мой заказ</i></a></li>
<!--                    <li role="presentation" class="--><?php //if($Path =='shop/default/cart'){ echo'active';} ?><!--"><a href="--><?//= Url::to('/shop/cart') ?><!--" class="--><?php //if ($quantityInCart > 0) {echo 'big-font';} ?><!--"><i class="fa fa-shopping-cart "> Корзина</i></a></li>-->
                    <?php if(Yii::$app->user->isGuest): ?>
                        <li role="presentation" class="<?php if($Path =='shop/default/signup'){ echo'active';} ?>"><a href="<?= Url::to('/shop/signup') ?>"><i class="fa fa-lock"> Регистрация</i></a></li>
                        <li role="presentation" class="<?php if($Path =='shop/default/login'){ echo'active';} ?>"><a href="<?= Url::to('/shop/login') ?>"><i class="fa fa-lock"> Вход</i></a></li>
                    <?php else: ?>
                        <li role="presentation" class="<?php if($Path =='shop/default/logout'){ echo'active';} ?>"><a href="<?= Url::to('/site/logout-shop') ?>"><i class="fa fa-lock"> Выход</i></a></li>
                    <?php endif ?>
                    <li role="presentation" class="<?php if($Path =='shop/default/2'){ echo'active';} ?>"><a href="<?= Url::to('/admin/index'); ?>"><i class="fa fa-lock"> Админка</i></a></li>
                </ul>
            </div>
                <div class="col-sm-2">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row line3">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= Url::to('/shop/index') ?>" class="active">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?= Url::to('/shop/products') ?>">Товары</a></li>
                                    <li><a href="<?= Url::to('/shop/detail') ?>">Товары в деталях</a></li>
                                    <li><a href="<?= Url::to('/shop/chekout') ?>"">Checkout</a></li>
                                    <li><a href="<?= Url::to('/shop/cart') ?>">Корзина</a></li>
                                    <li><a href="<?= Url::to('/shop/login') ?>">Login</a></li>
                                    <li><a href="<?= Url::to('/admin/index') ?>">Админка</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Статьи<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?= Url::to('/shop/blog'); ?>">Список статей</a></li>
                                    <li><a href="<?= Url::to('/shop/blog-single') ?>">Статья</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= Url::to('/site/index') ?>">KOTMONSTR</a></li>
                            <li><a href="<?= Url::to('/shop/contact') ?>">Обратная связь</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 money" >
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            RU
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">RU</a></li>
                            <li><a href="#">EN</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            RUB
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">RUB</a></li>
                            <li><a href="#">DOLLAR</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                        <a href="/shop/cart"><i class="fa fa-shopping-cart "> Корзина <span id="money"><?= $quantityInCart ?></span></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>

<style>
    #menu-top li a {
        color: #000000;
    }
    #menu-top li a:hover {
        color: #FE980F;
    }
    .nav>li>a {

        //padding: 10px 5px!important;
    }
    .first-left{
        //margin-top: 10px;;
    }
    .contactinfo ul li a{
        padding-left: 14px;
    }
    .money{
        margin-top: -10px;
    }
    #money, #wishlist, #comparelist{
        font-size: 18px;
        font-weight: bold;
        color: red;
    }
    .fa-shopping-cart:hover{
        font-size: 18px;
        font-weight: bold;
        //color: red;
    }
</style>