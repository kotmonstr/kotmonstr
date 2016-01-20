<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Reqvizit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reqvizits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div id="content">
    <div class="outer">
    <div class="inner bg-light lter">
    <div id="collapse4" class="body">
    <div class="reqvizit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        //'id',
        'company_name',
        'country',
        'address',
        'mobile',
        'fax',
        'email:email',
        'schet',
        'inn',
        'zip_code',
    ],
]) ?>

    </div>
    </div>
    </div>
    </div>
    </div>