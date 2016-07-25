<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
Yii::$app->formatter->locale = 'ru-RU';
/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <!--Begin Datatables-->





                <h1><?= Html::encode($this->title) ?></h1>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [


                        //'title',
                        [
                            'attribute' => 'title',
                            'format' => 'html',
                            'value' => function($data){
                                return Html::a($data->title,'/blog/update?id='.$data->id);
                            }
                        ],
                        //'image',
                        //'content:html',
                        //'created_at',
                        [

                            'attribute' => 'created_at',
                            //'format' => 'date',
                            'value' => function($data){
                                return Yii::$app->formatter->asDate($data->created_at, 'long');
                            }
                        ],
                        [

                            'attribute' => 'author',
                            //'format' => 'html',
                            'value' => function($data){
                                return $data->user->username;
                            }
                        ],
                        // 'updated_at',
                        //'author',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>




            </div>
        </div>
    </div>
</div>

<style>
    td{
        width: 200px!important;
        max-width:200px!important;
        overflow: hidden;
    }
</style>
