<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\VideoCategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории видео';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="video-categoria-index">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <p>
                        <?= Html::a('Создать Категорию для видео', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                                'format' => 'Html',
                                'value' => function($data) {
                                    return Html::a($data->name, '/video_categoria/default/view?id='.$data->id);
                                },
                                'contentOptions' => ['class' => 'come-class']
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
