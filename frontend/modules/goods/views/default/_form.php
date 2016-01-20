<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\GoodsCategory;
use backend\assets\AppAsset;
use common\models\Brend;


$this->registerJsFile('/js/custom/upload_goods.js',['depends'=> AppAsset::className()]);
$arrGoodsCategory = GoodsCategory::find()->all();
$arrBrend= Brend::find()->all();
?>

<div class="shop-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data'],'id'=> 'form-send-file']); ?>

    <?= $form->field($model, 'item')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList( ArrayHelper::map($arrGoodsCategory,'id','name'))->label('Категория товара '.Html::a('Создать категорию ','/goods_category/default/create')) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brend_id')->dropDownList( ArrayHelper::map($arrBrend,'id','name')) ?>


    <?php if($model->status == 1){
        echo $form->field($model, 'status')->checkbox(['class'=>'act'])->label('');
    }else{
        echo $form->field($model, 'status')->checkbox(['class'=>'non-act'])->label('');
    } ?>

    <?= $form->field($model, 'image_file')->fileInput(['class' => 'send-file','onchange'=> 'sendfile()']) ?>

<?= $model->image != '' ? Html::img('/upload/goods/'.$model->image,['width'=> '200px','height'=> '200px','class'=>'target_image']) : Html::img('/img-custom/no_photo.jpg',['width'=> '200px','height'=> '200px','class'=>'target_image']) ; ?>

    <div class="form-group" style="margin-top: 10px">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>