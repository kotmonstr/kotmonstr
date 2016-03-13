<?
$allContentCountLetters = strlen($model->content);
$leftContent = substr($model->content, 0, -($allContentCountLetters / 2));
$rightContent = substr($model->content, -($allContentCountLetters / 2));
?>

<div class="col-md-6 text"  style="padding: 0px 45px;margin-top: 20px">
    <?= $leftContent; ?>
</div>

<div class="col-md-6 text" style="padding: 0px 45px;margin-top: 20px">
    <?= $rightContent; ?>
</div>