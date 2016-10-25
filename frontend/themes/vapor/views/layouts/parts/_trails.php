<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<? if(isset($model)): ?>
<!-- start trial area -->
<div id="trails">
    <div id="trail-title">
    </div>
    <div class="container">
        <div class="row">
            <div id="trail-gallery">
                <div id="trail-slider">

                    <?php foreach ($model as $blog):
                    $image = $blog->image;
                    if ($image == '') {
                        $image = "/img-custom/default.jpg";
                    }
                    ?>

                    <div class="item">
                        <div class="trail-image">
                            <img src="<?= $image ?>" alt="<?= StringHelper::truncate($blog->title, 190) ?>">
			      		<span class="trail-hover">
				      		<a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]) ?>" class="popup">
                                <i class="fa fa-external-link"></i>
                            </a>
			      		</span>
                        </div>
                        <h3>
                            <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]) ?>" class="popup">
                                <?= StringHelper::truncate($blog->title, 120) ?>
                            </a>
                        </h3>
           
                    </div>

                    <? endforeach; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- end trial area -->
<? endif; ?>