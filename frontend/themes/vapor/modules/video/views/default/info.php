<?php

use yii\helpers\Url;
?>


<?php if (isset($imageSrc) && $imageSrc != ''): ?>
    <span id="yes" style="">1</span>
    <input type="hidden" value="<?= $id ?>" name="id">
    <label class="control-label col-lg-4">Наименование</label>
    <div class=" col-lg-6">
        <input class="validate[required] form-control" type="text" value="<?= $title ?>" name="title"/>
    </div>
    <label class="control-label col-lg-4">Описание</label>
    <div class=" col-lg-6">
        <textarea class="validate[required] form-control" type="text" name="descr" ><?= $descr ?></textarea>
    </div>
    <div class="form-actions no-margin-bottom">
        <center>     
            <img src="<?= $imageSrc ?>" alt="" width="200px">
            <input type="hidden" name="url" value="<?= $imageSrc ?>">
        </center>
    </div>
    <div class="form-actions no-margin-bottom">
        <center>     
            <?//= $preview ?>
        </center>
    </div>

  
<?php endif; ?>
<style>
    label{

        color: #000080;
    }
    .my-info{
        font-size: 20px;
        color: #000080;
    }
    .my-info-small{
        font-size: 10px;
        color: #000080;
    }
    #wrap{
        min-height:1200px;
        height:1200px;
    }
</style>