<?php
$this->registerJsFile('/frontend/web/js/custom/flash.js');

use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
?>
<section id="content">
    <div class="sub-content">
        <div class="container">
         
            <div class="row" style="">
                <?php foreach ($model as $video): ?>
                    <div class="col-sm-6 col-md-4 video-before-click"  onmouseover="hideImage('<?= $video->youtube_id; ?>')"  onmouseleave="showImage('<?= $video->youtube_id; ?>')">
                        <div class="thumbnail target-<?= $video->youtube_id ?>" onclick="ChangeVideo('<?= $video->youtube_id ?>')">
                            <img class="a-<?= $video->youtube_id; ?>" style="position:relative;float:left;width:100%" src="http://img.youtube.com/vi/<?= $video->youtube_id; ?>/mqdefault.jpg" alt="" > 
                            <img class="b-<?= $video->youtube_id; ?>" src="/img/youtube.png" alt="" style="position:absolute;top: 50px;right: 142px;padding: 14px;width: 121px;display:none">
                            <div class="caption">
                                <h5 style="color:#000"><?= StringHelper::truncate($video->title, 33); ?></h5>

                            </div>
                        </div>
                    </div>
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


