<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
Yii::$app->formatter->locale = 'ru-RU';
/* @var $this yii\web\View */
/* @var $searchModel common\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
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
                    <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <p>
                    <?= Html::a('Создать категорию для статей', ['/article_category/default/create'], ['class' => 'btn btn-success']) ?>
                </p>

                <p>
                    <?= Html::a('Создать template', ['/template/default/create'], ['class' => 'btn btn-success']) ?>
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
                                return Html::a(\yii\helpers\StringHelper::truncate($data->title,50),'/article/update?id='.$data->id);
                            }
                        ],

                       // Html::img()
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

                           'label' => 'картинка',
                            'format' => 'html',
                            'value' => function($data){
                                return Html::img($data->src.'/'.$data->image,['width'=>'100px']);
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
