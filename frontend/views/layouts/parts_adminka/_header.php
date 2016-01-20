<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
?>

<div id="top">

    <!-- .navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button>
                <a href="<?= Url::to('/site/index'); ?>" class="navbar-brand">
                    <h5 class="logo"><span class="red">Kot</span>monstr</h5>
                </a> 
            </header>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse">

      
            </div>
        </div><!-- /.container-fluid -->
    </nav><!-- /.navbar -->
    <header class="head">
        <div class="search-bar">
            <form class="main-search" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Live Search ...">
                    <span class="input-group-btn">
                       
                    </span> 
                </div>
            </form><!-- /.main-search -->
        </div><!-- /.search-bar -->
        <div class="main-bar">
         

           
            <h4>   <?php echo Yii::$app->controller->module->id . ' / '. Yii::$app->controller->id .' / '. Yii::$app->controller->action->id;
            ?></h4>
        </div><!-- /.main-bar -->
    </header><!-- /.head -->
</div><!-- /#top -->
<style>

    .logo{
        font-family: 'Kaushan Script', cursive;
        font-size: 24px;
    }
    .red{
        color:#CF3046;
    }
</style>   

