<?php
use yii\helpers\Url;
?>
<? if(isset($modelLastBlog)): ?>
<!-- parts -->
<div id="parts">
    <div id="parts-title">

    </div>
    <div class="container">
        <div class="row">
            <div id="parts-gallery">
                <div id="parts-slider">

                    <?php foreach ($modelLastBlog as $blog):
                        $image = $blog->image;
                        if ($image == '') {
                            $image = "/img-custom/default.jpg";
                        }
                        ?>
                    
                    <div class="item">
                        <div class="parts-image">
                            <img src="<?= $image ?>" alt="Trail Image">
			      		<span class="parts-hover">
				      		<a href="index.html">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
			      		</span>
                        </div>
                        <h3>
                            <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]); ?>">SRAM PG-950 9-Speed Cassette</a>
                        </h3>
                        <p>
                            Curabitur ullamcorper felis bibe
                            adipiscing vitae est
                        </p>
                        <p class="parts-price">
                            $36.00
                        </p>
                    </div>

                    <? endforeach; ?>
   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end parts-->

<? endif; ?>