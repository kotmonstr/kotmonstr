<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Reqvizit */
/* @var $form yii\widgets\ActiveForm */
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
<div class="reqvizit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'schet')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'zip_code')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>