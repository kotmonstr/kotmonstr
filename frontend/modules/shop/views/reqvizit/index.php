<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->registerJsFile('/js/custom/no-delete.js',['depends'=> \frontend\assets\ShopAsset::className()]);

$this->title = 'Реквизиты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
<div class="reqvizit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'company_name',
            'country',
            'address',
            'mobile',
            // 'fax',
             'email:email',
            // 'schet',
            // 'inn',
             'zip_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
</div>
</div>
</div>