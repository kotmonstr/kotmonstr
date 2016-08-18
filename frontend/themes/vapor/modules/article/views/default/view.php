<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoria */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категориии Видео', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
<div class="video-categoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            [
                'label'=>'Заголовок',
                'format'=>'raw',
                'value'=>$model->title,
            ],

            [
                'label'=>'Картинка',
                'value'=>$model->src.'/'.$model->image,
                'format' => ['image',['width'=>'200','height'=>'200']],
            ],

            [
                'label' => 'Содержание',
                'value' => \yii\helpers\StringHelper::truncate($model->content,200)
            ],
            [
                'label'=>'Дата создания',
                'format'=>'raw',
                'value'=> Yii::$app->formatter->asDate($model->created_at,'long')
            ],
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
