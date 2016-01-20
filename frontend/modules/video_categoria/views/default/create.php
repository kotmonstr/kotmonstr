<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoCategoria */

$this->title = 'Создать Категорию для видео';
$this->params['breadcrumbs'][] = ['label' => 'Video Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
