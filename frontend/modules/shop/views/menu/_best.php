<?php
use yii\helpers\StringHelper;

?>
<h2 class="title text-center">Рекомендуемые товары</h2>

<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">

            <?php foreach($modelBest as $best): ?>

            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?= '/upload/goods/'.$best->image ?>" alt="<?= $best->item ?>"/>

                            <h2>$<?= $best->price ?></h2>


                            <p><?= StringHelper::truncate($best->item,20) ?></p>
                            <a href="javascript:void(0);" onclick="addToCart(<?= $best->id ?>)" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>В корзину</a>
                        </div>

                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
        <div class="item">
            <?php foreach($modelBest as $best): ?>

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?= '/upload/goods/'.$best->image ?>" alt="<?= $best->item ?>"/>

                                <h2>$<?= $best->price ?></h2>

                                <p><?= StringHelper::truncate($best->item,20) ?></p>
                                <a href="javascript:void(0);" onclick="addToCart(<?= $best->id ?>)" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>В корзину</a>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<style>
    .single-products{
        height: 345px!important;
    }

</style>