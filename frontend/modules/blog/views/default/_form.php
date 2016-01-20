<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Url;
use frontend\assets\AppAsset;

$this->registerJsFile('/js/custom/tiny.js', ['depends' => AppAsset::className()]);
?>



<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

<?php if ($model->image && $model->image != ''): ?>
    <img src="<?= $model->image ?>" height="200px">
<?php endif; ?>

<?=
$form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 22],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            //"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking image",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor ",
        ],
        'toolbar' => "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor | image media code | styleselect formatselect fontselect fontsizeselect | forecolor backcolor  newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | fullscreen ",
    //'toolbar3'=> "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
    ]
]);
?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>





<?php
$form = ActiveForm::begin([
            'action' => ['/image/submit'],
            'options' => ['enctype' => 'multipart/form-data'],
            'id' => 'form-send-file']);
?>
<?= $form->field($model, 'file')->fileInput(['class' => 'send-file']) ?>

<?= Html::Button('Загрузить', ['class' => 'btn btn-success send-file-submit', 'onclick' => 'sendfile()']) ?>
<?php ActiveForm::end(); ?>

<style>
    #form-send-file{
        display:none;
    }
    .btn-upload{
        background-color: #087B6E;
        padding: 7px;
        border-radius: 3px;
        position: absolute;
        right: 154px;
        top: 200px;
        color: #fff;
        cursor: pointer;
        z-index: 999999;
    }
</style>