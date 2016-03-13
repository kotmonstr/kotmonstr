<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мета теги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="comment-index">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <p>
                <?= Html::a('Создать раздел', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'url',
                    [
                        'label' => 'Название страницы',
                        'format' => 'html',
                        'value' => function ($data) {
                            return StringHelper::truncate($data->title, 20);
                        }
                    ],
                    [
                        'label' => 'Описание  страницы',
                        'format' => 'html',
                        'value' => function ($data) {
                            return StringHelper::truncate($data->description, 20);
                        }
                    ],
                    [
                        'label' => 'Ключевые слова(через запятую)',
                        'format' => 'html',
                        'value' => function ($data) {
                            return StringHelper::truncate($data->keywords, 20);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
</div>
</div>
