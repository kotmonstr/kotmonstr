<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile('/js/jquery.js', ['depends' => AppAsset::className()]);

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="content">
    <div class="sub-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-4">
                    <h4>Регистрация</h4>
                    <div class="contact-form">
                        <?php
                        $form = ActiveForm::begin(['action' => '/site/signup',
                                    //'method' => 'POST',
                                    'id' => 'contact-form',
                                    'enableAjaxValidation' => true,
                        ]);
                        ?>
                        <fieldset>
                            <label class="name">
                                <?= $form->field($model, 'username')->label('')->textInput(['placeholder' => 'Имя']) ?>					                       						
                            </label>	
                            <label class="email">
                                <?= $form->field($model, 'email')->label('')->textInput(['placeholder' => 'Email', 'type' => 'input']) ?>												
                            </label>
                            <?= $form->field($model, 'password')->label('')->passwordInput(['placeholder' => 'Password']) ?>		
                            </label>		
                        </fieldset>
                        <div class="">                                           
                            <?= Html::submitButton('Регистрирация', ['class' => 'btn btn_ btn-small_', 'name' => 'login-button']) ?>
                        </div>
                        <input type="hidden" name="<?= \Yii::$app->request->csrfParam ?>"
                               value="<?= \Yii::$app->request->getCsrfToken() ?>">
                               <?php ActiveForm::end(); ?>
                    </div>
                </div>  
            </div>           
        </div>
    </div>
</section>
<style>
    .contact-form label {
        min-height: 10px; 

    }
    .help-block{
        margin-top: 0px!important;
        width:271px!important;
        height:36px;
        position: inherit!important;
        //border: 1px solid red!important;
    }
</style>
