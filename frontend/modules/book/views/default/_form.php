<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php
    $form = ActiveForm::begin([//'action' => ['/book/create'],
        'options' => ['enctype' => 'multipart/form-data'], 'id' => 'form-send-file']);
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <!--    --><? //= $form->field($model, 'eng_name')->textInput(['maxlength' => 255]) ?>



    <?= $form->field($model, 'download')->hiddenInput() ?>

    <?php if ($model->image): ?>
        <?= Html::img('/upload/book-thumbs/'.$model->image,['height'=> '150px']); ?>
    <?php endif ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>