<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Reqvizit */

$this->title = 'Create Reqvizit';
$this->params['breadcrumbs'][] = ['label' => 'Reqvizits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reqvizit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>