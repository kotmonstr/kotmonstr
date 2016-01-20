<?php
use yii\helpers\Url;

$Module = Yii::$app->getModule('shop');

?>
    <h2 class="title text-center">Товары</h2>
<?php foreach ($model as $good): ?>

    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="/shop/detail?item=<?= $good->id ?>"> <img src="<?= $Module::getGoodImage($good->image) ?>" alt="Просмотреть"/>
                    <h2>$<?= $good->price ?></h2>
                    <p><?= $good->item ?></p></a>
                    <a href="javascript:void(0);" onclick="addToCart(<?= $good->id ?>)"
                       class="btn btn-default add-to-cart"><i
                            class="fa fa-shopping-cart"></i>В корзину</a>
                </div>

            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="javascript:void(0);" onclick="AddToWishList(<?= $good->id ?>)"><i class="fa fa-plus-square"></i>В список желаний</a></li>
                    <li><a href="javascript:void(0);" onclick="AddToCompareList(<?= $good->id ?>)"><i class="fa fa-plus-square"></i>В список сравнений</a></li>
                </ul>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<style>
    .product-image-wrapper:hover {
    / / border : 1 px solid #7b7a7c;
        box-shadow: 3px 3px 10px #7b7a7c;
        cursor: pointer;
    }
</style>