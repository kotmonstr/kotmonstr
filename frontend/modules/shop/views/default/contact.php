<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\models\Contacts;
$model = new Contacts;
echo $this->render('/menu/_header', ['quantityInCart' => $quantityInCart])

?>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Обратная <strong>Связь</strong></h2>

                <div id="gmap" class="contact-map">
                    <script type="text/javascript" charset="utf-8"
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=-hFnmOTtJO7KjsfpF-e2_tnKfmVmp7Lt&width=1140&height=300"></script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Связаться с нами</h2>

                    <div class="status alert alert-success" style="display: none">d</div>
                    <div class="status alert alert-error" style="display: none">d</div>
                    <?php $form = ActiveForm::begin([
                        'method'=>'post',
                        'id' => 'main-contact-form',
                        'action' => '/contact/add-contact',
                        //'enableAjaxValidation'=> true,
                        //'enableClientValidation'=>true
                    ]); ?>

                    <div class="form-group col-md-6">
                        <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Имя'])->label('') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Email','type'=>'email'])->label('') ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?= $form->field($model, 'subject')->textInput(['class' => 'form-control', 'placeholder' => 'Teмa'])->label('') ?>
                    </div>
                    <div class="form-group col-md-12">
                        <?= $form->field($model, 'content')->textarea(['id' => 'message', 'class' => 'form-control', 'placeholder' => 'Ваше сообщение', 'rows' => 8])->label('') ?>
                    </div>
                    <div class="form-group col-md-12">
<!--                        --><?//= Html::submitButton('Отправить', ['class' => 'btn btn-primary pull-right']) ?>
                        <a href="javascript:void(0);" class='btn btn-primary pull-right' onclick="AddContact()">Отправить </a>
                    </div>
                    <input type="hidden" name="<?= \Yii::$app->request->csrfParam ?>"
                           value="<?= \Yii::$app->request->getCsrfToken() ?>">
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Контакты</h2>
                    <address>
                        <p><?= $modelReqvizit->company_name ?></p>

                        <p><?= $modelReqvizit->address ?></p>

                        <p><?= $modelReqvizit->country ?></p>

                        <p>Моб.Тел: <?= $modelReqvizit->mobile ?></p>

                        <p>Fax: <?= $modelReqvizit->fax ?></p>

                        <p>Email: <?= $modelReqvizit->email ?></p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center"> В социальных сетях</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>