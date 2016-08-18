<?php

use frontend\assets\AdminAsset;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->registerJsFile('/js/custom/image-upload.js', ['depends' => AdminAsset::className()]);

?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="brend-index">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'form-article']]); ?>
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'article_category')->dropDownList([NULL => ''] + ArrayHelper::map(common\models\ArticleCategory::find()->all(), 'id', 'name')) ?>
                    <?= $form->field($model, 'template')->dropDownList([NULL => ''] + ArrayHelper::map(common\models\Template::find()->all(), 'id', 'name')) ?>
                    <?= $form->field($model, 'content')->widget(Widget::className(), [
                        'settings' => [
                            'iframe' => true,
                            'air' => true,
                            'formatting' => ['iframe'],
                            'lang' => 'ru',
                            'minHeight' => 400,
                            'pastePlainText' => true,
                            'buttonSource' => true,
                            'focus' => true,
                            'imageUpload' => '/blog/upload',
                            'imageManagerJson' => '/blog/uploaded',
                            'plugins' => [
                                'clips',
                                'fullscreen',
                                'imagemanager',
                                //'filemanager'
                            ]
                        ]
                    ]) ?>
                    <?= $form->field($model, 'image')->textInput(['maxlength' => true, 'style' => 'display:none'])->label('') ?>
                    <?= $form->field($model, 'src')->hiddenInput(['value' => '/upload/article'])->label('') ?>
                    <? if ($model->image) { ?>
                        <img src="<?= $model->src . '/' . $model->image ?>" width="200px" alt="">
                    <? } ?>
                    <div class="photo"
                         onchange="startUpload()"><?= $form->field($model, 'file')->fileInput()->label('Картинка', ['class' => 'red-b']) ?></div>
                    <div class="avatar"></div>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Принять изменения', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>




