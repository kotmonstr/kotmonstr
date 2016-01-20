<?php

use yii\helpers\Html;
use yii\grid\GridView;

Yii::$app->formatter->locale = 'ru-RU';
$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="user-index">

                    <h1><?= Html::encode($this->title) ?></h1>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('Создать Пользователя', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'username',
                            'password',
                            //'auth_key',
                            //'password_hash',
                            //'password_reset_token',
                            'email:email',
                            'role',
                            'status',
                            //'created_at',
                            [
                                'attribute' => 'created_at',
                                'format' => 'html',
                                'value' => function($data){
                                return Yii::$app->formatter->asDate($data->created_at, 'long');
                                        
                                }
                            ],
                            // 'updated_at',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


