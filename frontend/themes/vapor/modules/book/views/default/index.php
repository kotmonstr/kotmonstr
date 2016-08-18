<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
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
                        <?= Html::a('Создать Книгу', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?= GridView::widget(['dataProvider' => $dataProvider, 'filterModel' => $searchModel, 'columns' => [['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'name:ntext',

                        'eng_name',
                        ['attribute' => 'image', 'format' => 'html', 'value' => function ($dataProvider) {
                            if ($dataProvider->image) {
                                return Html::img('/upload/book-thumbs/' . $dataProvider->image, ['height' => '100px']);
                            } else {
                                return Html::img('/img-custom/default.jpg', ['height' => '100px']);
                            }
                        }, 'label' => 'Предпросмотр',],
                        'download',

                        ['class' => 'yii\grid\ActionColumn'],],]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
