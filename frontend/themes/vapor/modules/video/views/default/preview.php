<?php

use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
?>
<section id="content">
    <div class="sub-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="">
                      Сортировка по категории:
                    <select id="dropdown-categoria" class="form-control" style="width:200px" onchange="GetVideoByCategiryId($())">
                        <option value="0"><?= 'Выбери ...'; ?></option>
                        <option value="00"><?= 'Все'; ?></option>
                        <?php foreach ($model_categoria as $video): ?>
                            <option value="<?= $video->id ?>" > <?= $video->name ?> </option>

                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3" style="">
                      Сортировка по автору:
                    <select id="dropdown-author" class="form-control" style="width:200px" onchange="GetVideoByAuthorId($())">
                        <option value="0"><?= 'Выбери ...'; ?></option>
                        <option value="00"><?= 'Все'; ?></option>
                        <?php foreach ($model_author as $video): ?>
                            <option value="<?= $video->id ?>" > <?= $video->name ?> </option>

                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3" style="">
                    Сортировка по дате:
                    <select id="dropdown-time" class="form-control" style="width:200px" onchange="GetVideoByTime()">
                        <option value="0"><?= 'UP'; ?></option>
                        <option value="1"><?= 'Down'; ?></option>

                    </select>
                </div>
               

            </div>

            <div id="target" class="row" style="">
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
    .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        display: block;
        height: auto;
        max-width: 27%;
    }
    .red-x{
        color:#f8b9b7;
        float:right;
        cursor:pointer;
        margin-right: -7px!important;
        margin-top: -7px!important;
    }
    .red-x:hover{
        color:red;
        float:right;
        cursor:pointer;
    }
    .row {
        padding: 5px!important;
    }
</style>