<?php
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>
<? if(isset($model)): ?>
<!-- parts -->
<div id="parts">
    <div id="parts-title">

    </div>
    <div class="container">
        <div class="row">
            <div id="parts-gallery">
                <div id="parts-slider">

                    <?php foreach ($model as $blog):
                        $image = $blog->image;
                        if ($image == '') {
                            $image = "/img-custom/default.jpg";
                        }
                        ?>
                    
                    <div class="item">
                        <div class="parts-image">
                            <img src="<?= $image ?>"  alt="<?= StringHelper::truncate($blog->title, 190) ?>">
			      		<span class="parts-hover">
				      		<a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]) ?>">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
			      		</span>
                        </div>
                        <h3>
                            <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]); ?>"><?= StringHelper::truncate($blog->title, 120) ?></a>
                        </h3>

                    </div>

                    <? endforeach; ?>
   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end parts-->

<? endif; ?>