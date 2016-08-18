<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
?>

<?php Pjax::begin(['enablePushState' => false]); ?>
<?= Html::a("Обновить", ['/blog/pjax'], ['class' => 'btn btn-lg btn-primary']);?>
    <h1>Сейчас: <?= $time ?></h1>
<?php Pjax::end(); ?>