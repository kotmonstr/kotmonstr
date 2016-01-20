<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\GoodsCategory;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="shop-index">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],


                            [
                                'attribute'=>'item',
                                'format' => 'html',
                                'value'=> function($dataProvider){
                                    return  Html::a($dataProvider->item,'/goods/default/view?id='.$dataProvider->id);
                                }
                            ],
                            [
                                'attribute' => 'category_id',
                                'format' => 'html',
                                'value' => function ($dataProvider) {
                                    return GoodsCategory::find()->where(['id' => $dataProvider->category_id])->one()->getName();
                                }
                            ],



                            'quantity',
                            'price',

                            ['attribute' => 'image', 'format' => 'html', 'value' => function ($dataProvider) {
                                if ($dataProvider->image) {
                                    return Html::img('/upload/goods/' . $dataProvider->image, ['height' => '100px']);
                                } else {
                       return '';
                                }
                            }, 'label' => 'Предпросмотр',],

                            // 'descr:ntext',
                            // 'status',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>