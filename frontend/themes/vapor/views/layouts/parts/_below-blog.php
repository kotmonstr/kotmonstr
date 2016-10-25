<?php

$title_1 = isset($title_1) ? $title_1 : 'kotmonstr';
$title_2 = isset($title_2) ? $title_1 : 'kotmonstr';
$text = isset($text) ? $text : 'kotmonstr';

?>


<!-- strat below gallery area -->
<div id="below-blog">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="below-blog-text">
                    <p>kotmonstr</p>
                    <h4 class="wow fadeInDown" data-wow-duration="0.3s"><span class="h4-style1"><?= $title_1?></span><?= $title_2?></h4>
                </div>
            </div>
            <div class="col-sm-8">
                <div id="below-blog-para">
                    <p><?= $text ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end below gallery area -->