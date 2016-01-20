<?php
use yii\helpers\Url;
use common\models\Cart;
use yii\helpers\StringHelper;
use common\models\Exchange;
use yii\widgets\ActiveForm;
use yii\helpers\Html;



$model = new \frontend\models\SignupForm();
$Module = Yii::$app->getModule('shop');
$i = 1;

// Валюта
$rates = new Exchange(time());
$USD = $rates->GetRate("USD");
$UKR = $rates->GetRate("UAH");
$EUR = $rates->GetRate("EUR");

echo $this->render('/menu/_header', ['quantityInCart' => $quantityInCart, 'USD' => $USD, 'UKR' => $UKR, 'EUR' => $EUR]);

?>


<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="login-form">
                    <h2>Регистрация</h2>


                    <?php
                    $form = ActiveForm::begin(['action' => '/site/signup-submit',
                        'method' => 'POST',
                        //'id' => 'contact-form',
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => true


                    ]);
                    ?>

                    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Имя'])->label('') ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email', 'type' => 'input'])->label('') ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label('') ?>
                    <div class="form-group" style="margin-top: 30px">
                    <span>
							<input type="checkbox" class="checkbox ch" name="SignupForm[checkbox]">
							<span style="margin-top: 10px">Войти после регистрации</span>
                    </span>
                    </div>
                    <div class="">
                        <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
                    </div>
                    <input type="hidden" name="<?= \Yii::$app->request->csrfParam ?>"
                           value="<?= \Yii::$app->request->getCsrfToken() ?>">
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .login-form form input, .signup-form form input {
        margin: -5px;
    }
    .ch{
        margin: 2px!important;
    }

</style>