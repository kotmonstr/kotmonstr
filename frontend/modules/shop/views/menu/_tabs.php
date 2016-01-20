<?php
use yii\helpers\StringHelper;
use common\models\Goods;
$i=0;
?>

<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
<!--            <li class="active"><a href="#all" data-toggle="tab">--><?//= 'Все'; ?><!--</a></li>-->
            <?php foreach ($modelGoodsCategories as $cat): ?>
                <?php $i++ ?>
                <li class="<?php if($i== 1){echo'active';} ?>"><a href="#<?= str_replace(' ', '', $cat->name) ?>" data-toggle="tab"><?=  $cat->name ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="tab-content">
        <?php foreach ($modelGoodsCategories as $cat): ?>
            <div class="tab-pane fade active in" id="<?= str_replace(' ', '', $cat->name) ?>">
                <?php $goodsOfCategotyId = Goods::getGoodsByCategoriId($cat->id); ?>
                <?php if ($goodsOfCategotyId): ?>
                    <?php foreach ($goodsOfCategotyId as $good): ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="/shop/detail?item=<?= $good->id ?>"><img src="<?= '/upload/goods/' . $good->image ?>" alt=""/></a>

                                        <h2>$<?= $good->price ?></h2>

                                        <p><?= StringHelper::truncate($good->item,20) ?></p>
                                        <a href="javascript:void(0);" onclick="addToCart(<?= $good->id ?>)" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>