<?php

use yii\helpers\Html;
use frontend\assets\VaporAsset;

use common\models\Seo;
use app\components\SeoHelper;
VaporAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= SeoHelper::getMeta(); ?>
    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-offset="170" data-target="#fixed-collapse-navbar">
<?php $this->beginBody() ?>
<?//= $this->render('parts/_docs-info') ?>
<?= $this->render('parts/_loader') ?>
<?= $this->render('parts/_header') ?>
<?= $this->render('parts/_nav') ?>




<?= $content ?>

<?= $this->render('parts/_footer') ?>
<?= $this->render('parts/_copyright') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<!-- end scripts -->
<script type="text/javascript">
    jQuery(function() {
        $('form.bottom-contact-form').on('submit', function(){
            $("<div />").addClass("formOverlay").appendTo($(this));
            var curForm = jQuery(this);
            $.ajax({
                url: 'mail.php',
                type: 'POST',
                data: jQuery(curForm).serialize(),
                success: function(data) {
                    var res=data.split("::");
                    jQuery(curForm).find("div.formOverlay").remove();
                    jQuery(curForm).prev('.expMessage').html(res[1]);
                    if(res[0]=='Success')
                    {
                        jQuery(curForm).remove();
                        jQuery(curForm).prev('.expMessage').html('');
                    }
                }
            });
            return false;
        });
    });
</script>	