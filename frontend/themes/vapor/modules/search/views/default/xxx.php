<?php
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
//vd($model);
?>
<section id="content">
    <div class="sub-content">
        <div class="container">

            <div class="row" style="">
                <?php foreach ($model as $video): ?>
                    <?php

                    if($video->id){?>
                        <iframe src="http://embed.redtube.com/?id=<?= $video->url ?>&bgcolor=000000" frameborder="0" width="400" height="340" scrolling="no"></iframe>

                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <?php
            // display pagination
            echo LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
        </div>
    </div>
</section>


<style>
    .video-before-click{
        opacity: 0.8;
    }
    .video-before-click:hover{
        opacity: 1;
        cursor:pointer;

    }
    .video-before-click-link{
        opacity: 0.8;
        color:#fff;
    }
    .video-before-click-link:hover{
        opacity: 1;


    }


</style>




