<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\NewsletterForm;
use yii\helpers\Html;

;

$model = new NewsletterForm;
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="span4 float2">

                <?php
                $form = ActiveForm::begin(['id' => 'newsletter',
                            'action' => '/email/submit',
                            'enableClientValidation' => true,
                ]);
                ?>
                <label>Новости</label>
                <div class="clearfix">
                    <!--<input type="text" onFocus="if(this.value =='Введите e-mal' ) this.value=''" onBlur="if(this.value=='') this.value='Введите e-mail'" value="Введите e-mail" >-->
                    <?= $form->field($model, 'email')->textInput(['value' => "Введите e-mail", 'onBlur' => 'if(this.value=="") this.value="Введите e-mail"', 'onFocus' => 'if(this.value =="Введите e-mail" ) this.value=""'])->label('') ?>              
                    <?= Html::submitButton('Подписаться', ['class' => 'btn btn_']); ?>
                    <!--<a href="javascript:void(0);" class="btn btn_" >Подписаться</a>-->
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="span8 float">
                <ul class="footer-menu">
                    <li><a href="<?= Url::to('/site/index') ?>" class="current">Главная</a>|</li>
                    <li><a href="<?= Url::to('/video/index') ?>">Видео</a>|</li>
                    <li><a href="<?= Url::to('/video/tv') ?>">Тв</a>|</li>
                    <li><a href="<?= Url::to('/image/index') ?>">Фотографии</a>|</li>
                    <li><a href="<?= Url::to('/blog/index') ?>">Статьи</a>|</li>
                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == 1 || !Yii::$app->user->isGuest && Yii::$app->user->id == 2 || !Yii::$app->user->isGuest && Yii::$app->user->id == 3) { ?><li><a href="<?= Url::to('/admin/index') ?>">Админка</a></li><?php } ?>
                </ul>
                Kotmonstr  &copy;  <?= date("Y", time()); ?>  |   <a href="/site/index">Privacy Policy</a> <!-- {%FOOTER_LINK} -->
            </div>
        </div>
    </div>
</footer>
<style>
    .btn_ {
        //float: right;
        font-size: 8px;
        margin-top: 0px;
        margin-left: 224px;
        position: absolute;
        /* float: right; */
        //right: 58px;
        /* top: -3px; */
    }
    .help-block{
        color: #a94442;
        position: absolute;
        /* border: 1px solid red; */
        width: 150px;
        top: 16px;
        font-size: 9px;
        isplay: block;
        margin-bottom: 10px;
    }
</style>
