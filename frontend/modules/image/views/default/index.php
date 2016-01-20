<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\AppAsset;

$this->registerJsFile('/js/custom/switch-image.js', ['depends' => AppAsset::className()]);

/* @var $this yii\web\View */
/* @var $searchModel common\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдер';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <!--Begin Datatables-->
                <div class="image-index">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('Загрузить фотки', ['/image/default/upload'], ['class' => 'btn btn-success']) ?>
                    </p>
              

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'name',
                            [
                                'attribute' => 'name',
                                'format' => 'html',
                                'value' => function ($dataProvider) {
                                    return '<img src='.'/upload/slider-thumbs/' . $dataProvider->name . ' height="100px">';
                                },
                                'label' => 'Предпросмотр',
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'raw',
                                'value' => function ($dataProvider) {
                                    if($dataProvider->status == 0){
                                          return '<input type="checkbox" id="'.$dataProvider->id.'"  class="act">';
                                    }
                                    else{
                                          return '<input type="checkbox" id="'.$dataProvider->id.'" class=non-act>';
                                    }      
                                },
                                'label' => 'Активо/ Не активно',
                            ],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


