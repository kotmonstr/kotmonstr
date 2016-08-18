<?php


/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error" >

    <h1><?= $code ?></h1>



    <p>

        <a href="/site/index">Назад</a>
    </p>
    <p>
       <?= $code == '404' ? 'Страница не найдена.' : 'Нет прав доступа'; ?>
    </p>

</div>
<style>
    h1{
        font-size: 150px;
    }
    .site-error {
        background-color: #000;
        color: #fff;
        font-size: 24px;
        z-index: 999;
        position: absolute;
        width: 100%;
        height: 100%;
        left: 42%;
        top: 30%;
        width: 275px;
        height: 300px;
    }
    .bg-dark{
        background-color: #000; 
    }
   
</style>