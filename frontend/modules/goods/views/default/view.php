<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\GoodsCategory;
/* @var $this yii\web\View */
/* @var $model common\models\Shop */

$this->title = $model->item;
$this->params['breadcrumbs'][] = ['label' => 'Shops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
<div class="shop-view">

    <h1><?= 'Товар: '. Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'item',
            'price',


            [
                'attribute'=>'category_id',
                'format'=>'raw' ,
                'value'=> Html::a(GoodsCategory::find()->where(['id'=>$model->category_id])->one()->getName(),'/goods_category/default/view?id='.$model->category_id)


            ],
            'quantity',
            'descr:ntext',
            'status',

            [
                'attribute'=>'image',
                'value'=> $model->image ? '/upload/goods/'.$model->image : '/img-custom/no_photo.jpg',
                'format' => ['image',['width'=>'300','height'=>'300']],
            ],
             ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>