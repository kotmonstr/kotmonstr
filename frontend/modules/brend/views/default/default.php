<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Brend */

$this->title = 'Update Brend: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brends', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brend-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>