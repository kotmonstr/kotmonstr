<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Fun;
use common\models\GeoCountry;
use yii\helpers\ArrayHelper;

$this->registerJsFile('/js/custom/profile-upload.js');

$ArrGender = ['1' => 'Мужчина', '2' => 'Женщина'];
$file_avatar = Yii::getAlias('@frontend').'/web/upload/user/'.Yii::$app->user->id.'/avatar/avatar.jpg';
$shot= '/upload/user/'.Yii::$app->user->id.'/avatar/avatar.jpg';
//$gender = $model->gender;
?>
<section id="content">
    <div class="sub-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <h4>Личные данные</h4>
                    <div class="contact-form">
                        <div class="ProfileForm">
                            <?php $form = ActiveForm::begin(['id' => 'form-prifile']); ?>
                            <?= $form->field($model, 'name') ?>
                            <?= $form->field($model, 'sername') ?>
                            <div class="form-group" >
                                <label class="control-label" >Пол</label>
                                <?= Fun::DropDown($ArrGender, $model->gender, 'form-control drop', 'gender') ?>
                                <div class="help-block"></div>
                            </div>


                            <?= $form->field($model, 'city_id') ?>


                            <div class="form-group" >
                                <label class="control-label" >Страна</label>
                                <?= Fun::DropDown(ArrayHelper::map(GeoCountry::find()->all(), 'id', 'name_ru'), 20, 'form-control drop', 'country_id') ?>
                                <div class="help-block"></div>

                            </div>

                            <div class="photo" onchange="startUpload()"><?= $form->field($model, 'avatar')->fileInput()->label('Аватарка',['class'=>'red-b']) ?></div>
                            <div class="avatar"> <?php if (file_exists($file_avatar)) {echo Html::img($shot); }?></div>
                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn_ btn-small_']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .contact-form label {
        min-height: 0px; 
    }
    .drop{
        width:270px;
        color: #fff;
        background-color: #313133;       
        border: 0; 
    }
    .photo{
        position: absolute;
        top: 231px;
        left: -272px;
    }
    #profile-avatar{
        color: #000;
        background-color: #000;
        z-index: 999999;
    }
    .avatar{
        //border: 1px solid red;
        width: 150px;
        height: 149px;
        position: absolute;
        top: 78px;
        left: -205px;
    }
    #profile-avatar {
        color: #000;
        background-color: #000;
        z-index: 999999;
        opacity: 0;
        cursor: pointer;
    }
    .field-profile-avatar{
        width: 100%;
        height: 36px;
        cursor: pointer;
        display: block;
        background-color: red;
        border-radius: 5px;
    }
    .red-b{
        color: #fff;
        font-size: 20px;
        text-align: center;
        padding: 7px;
    }
</style>