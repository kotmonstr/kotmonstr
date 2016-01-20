<?php

use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
?>
                <?php foreach ($model as $video): ?>
                    <?php if ($video->title != '') { ?>

                        <div class="col-sm-6 col-md-4 video-before-click"  onmouseover="hideImage('<?= $video->youtube_id; ?>')"  onmouseleave="showImage('<?= $video->youtube_id; ?>')">
                            <span onclick="DeleteVideoById($(this), '<?= $video->youtube_id; ?>')" class="glyphicon glyphicon-remove red-x" aria-hidden="true"></span>
                            <div class="thumbnail target-<?= $video->youtube_id ?>" onclick="ChangeVideo('<?= $video->youtube_id ?>')">
                                <img class="a-<?= $video->youtube_id; ?>" style="position:relative;float:left;width:100%" src="http://img.youtube.com/vi/<?= $video->youtube_id; ?>/mqdefault.jpg" alt="" > 

                                <div class="caption">
                                    <h5 style="color:#000"><?= StringHelper::truncate($video->title, 33); ?></h5>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
          