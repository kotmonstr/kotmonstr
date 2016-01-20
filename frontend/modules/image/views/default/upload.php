<?php

//$this->registerJsFile('/js/custom/uploader.js');
// with UI

use dosamigos\fileupload\FileUploadUI;
?>
<div id="content">
    <div class="outer">
        <div class="inner bg-light lter">
            <div id="collapse4" class="body">
                <!--Begin Datatables-->
                <div class="image-index">
                    <?=
                    FileUploadUI::widget([
                        'model' => new \common\models\ImageSlider,
                        'attribute' => 'file',
                        'url' => ['/image/upload-submit'],
                        'gallery' => false,
                        'fieldOptions' => [
                            'accept' => 'image/*'
                        ],
                    ]);
                    ?>
                    <div id="progress">
                        <div class="bar" style="width: 0%;"></div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<style>

    .bar {
        height: 18px;
        background: green;
    }
</style>