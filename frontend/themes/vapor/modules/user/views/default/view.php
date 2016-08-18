<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

Yii::$app->formatter->locale = 'ru-RU';

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="user-view">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?=
                        Html::a('Удалить', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                    </p>

                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'username',
                            'auth_key',
                            'password_hash',
                            'password_reset_token',
                            'email:email',
                            'role',
                            'status',
                            [
                                'label' => 'created_at',
                                'value' => Yii::$app->formatter->asDate($model->created_at, 'long')
                            ],
                            [
                                'label' => 'updated_at',
                                'value' => Yii::$app->formatter->asDate($model->updated_at, 'long')
                            ]
                        ],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
