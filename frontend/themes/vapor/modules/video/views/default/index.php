<?php

use yii\helpers\Url;
?>


<div class="container">
    <div class="col-lg-10">
        <div class="box">
            <header class="dark">
                <div class="icons">
                    <i class="fa fa-check"></i>
                </div>
                <h5>Youtube</h5>
                <div class="toolbar">
                    <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                            <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                            <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                            <i class="fa fa-times"></i>
                        </a> 
                    </nav>
                </div><!-- /.toolbar -->
            </header>
            <div id="collapse2" class="body">
                <form class="form-horizontal" id="youtube-form" method="POST" action="<?= Url::to('/video/add') ?>">
                    <div class="form-group">
                        <label class="control-label col-lg-4">Введите адресс Youtube ролика</label>
                        <div class=" col-lg-6">
                            <input class="validate[required] form-control" type="text" name="youtube" id="youtube" onkeyup="sendYoutubeCode()" onchange="sendYoutubeCode()"/>
                        </div>
                    </div>
                    <div class="form-group info">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Выберите категорию</label>
                        <div class="col-lg-6">
                            <select name="categoria"  class="validate[required] form-control">
                                <?php foreach ($video_categoria as $video) { ?>
                                    <option value=""></option>
                                    <option value="<?= $video->id ?>"><?= $video->name ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Выберите автора</label>
                        <div class="col-lg-6">
                            <select name="author_id"  class="validate[required] form-control">
                                <?php foreach ($authors as $author) { ?>
                                    <option value=""></option>
                                    <option value="<?= $author->id ?>"><?= $author->name ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" class="csrf" name="<?= \Yii::$app->request->csrfParam ?>"
                           value="<?= \Yii::$app->request->getCsrfToken() ?>">
                    <div class="form-actions ">
                        <center>     
                            <input type="submit" value="Загрузить" class="btn btn-primary">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    label{

        color: #000080;
    }
    .form-control{
        //background-color: rgb(166, 165, 165);
        //color: #fff;
    }

</style>
