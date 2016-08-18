<?php
use frontend\components\FirstWidget;
use frontend\components\SecondWidget;
use frontend\components\ModalWidget;
use frontend\components\PlayerWidget;

?>

<?//= FirstWidget::widget(['a'=>33,'b'=> 20]); ?>


<?php //SecondWidget::begin(); ?>
<!--    <p class="ss">Этот текст сделвем красным</p>-->
<?php //SecondWidget::end(); ?>


<?php //ModalWidget::begin(); ?>
<?php //ModalWidget::end(); ?>


<?= PlayerWidget::widget(); ?>