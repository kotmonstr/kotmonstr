<?
$allContentCountLetters = strlen($model->content);
$delimeter = $allContentCountLetters / 3;

$newtext = wordwrap($model->content, $delimeter, "||");
$text = explode("||",$newtext);

?>

<div class="col-md-4 text"  style="padding: 0px 45px;margin-top: 20px">
    <?= $text[0] ?>
</div>

<div class="col-md-4 text" style="padding: 0px 45px;margin-top: 20px">
    <?= $text[1] ?>
</div>

<div class="col-md-4 text" style="padding: 0px 45px;margin-top: 20px">
    <?= $text[2] ?>
    <?= !empty($text[3]) ?  $text[3] : ''; ?>
</div>