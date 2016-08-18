<?php
use common\models\User;
use yii\helpers\StringHelper;
Yii::$app->formatter->locale = 'ru-RU';
?>
 
    <div class="row-fluid" style="opacity: 0">
            <div class="container">
                <div class="span12 target main-comment pos bg_preview_post">
                    <div class="span2" style="text-align: center">
                        <?= User::getAvatar($model->author_id) ?><br>
                        <div class="com-name"><?= $model->author->username ?></div>
                    </div>

                    <div class="span8" title="<?= $model->content ?>">
                        <?= StringHelper::truncate($model->content,1000); ?>
                    </div>
                    <div class="span2 time-d">
                        <?= Yii::$app->formatter->asDate($model->created_at, 'long'); ?><br><?= date("H:i",$model->created_at) ?>
                    </div>
                </div>
            </div>
        </div>