<?php
use dosamigos\fileupload\FileUploadUI;


/* @var $this yii\web\View */
/* @var $model common\models\Image */

$this->title = 'Создать  Image';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <div class="image-create">


<?=
FileUploadUI::widget([
    'model' => $model,
    'attribute' => 'name',
    'url' => ['/image/create'],
    'gallery' => true,
    'fieldOptions' => [
        'accept' => 'image/*'
    ],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    // ... 
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
        'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
    ],
]);
?>

                </div>
            </div>
        </div>
    </div>
</div>
