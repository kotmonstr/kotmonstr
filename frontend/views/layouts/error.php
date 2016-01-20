<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
      
        <?php $this->head() ?>
    </head>
    <body>
   
        <div class="bg-dark" id="wrap" style="min-height:1000px">
            <?php $this->beginBody() ?>
          
          

         
            <?= $content ?>

            <?php $this->endBody() ?>
        </div>   
    </body>  
</html>
<?php $this->endPage() ?>
