<?php
use yii\helpers\Url;


?>
<!-- Main-Navigation -->
<div id="main-navigation">
    <div id="navigation" data-spy="affix" data-offset-top="108">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="row text-center">
                    <!--  Brand and toggle get grouped for better mobile display -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar"> <span class="sr-only">Our Shops</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </div>
                    </div>
                    <!--  Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse" id="fixed-collapse-navbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?= Url::to('/site/index') ?>" >Главная</a> </li>
                            <li class=""><a href="<?= Url::to('/news') ?>" >Новости</a> </li>
                            <li class=""><a href="<?= Url::to('/blog') ?>" >Статьи</a> </li>
                            <li class=""><a href="#instructors" class="scroll">instructor</a> </li>
                            <li class=""><a href="#party-images" class="scroll">Gallery</a> </li>
                            <li class=""><a href="#" class="scroll">news</a> </li>
                            <li class=""><a href="#packages" class="scroll">price</a></li>
                            <li class=""><a href="#blog-section" class="scroll">blog</a></li>
                            <li class=""><a href="#contact" class="scroll">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Main-Navigation -->