<?php
use yii\helpers\Url;
use common\models\Cart;
use yii\helpers\StringHelper;
use common\models\Exchange;
use common\models\Wishlist;
$Module = Yii::$app->getModule('shop');
$i = 1;

// Валюта
$rates = new Exchange(time());
$USD =  $rates->GetRate("USD");
$UKR =  $rates->GetRate("UAH");
$EUR =  $rates->GetRate("EUR");

echo $this->render('/menu/_header', ['quantityInCart' => $quantityInCart,'USD'=> $USD,'UKR'=> $UKR,'EUR'=> $EUR,'quantityWishlist'=> $quantityWishlist,'quantityCompareList'=> $quantityCompareList]);


?>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <?php foreach ($modelSlider as $slide): ?>
                            <?php $i++; ?>
                            <li data-target="#slider-carousel" data-slide-to="<? +$i ?>"></li>

                        <?php endforeach ?>
                    </ol>
                    <?php $i = 0; ?>
                    <div class="carousel-inner">
                        <?php foreach ($modelSlider as $slide): ?>
                            <?php $i++; ?>
                            <div class="item <?php if ($i == 1) echo "active"; ?>">
                                <div class="col-sm-6">
                                    <h1><span>K</span>OTMONSTR-SHOPPER</h1>

                                    <h2>KOTMONSTR Shop</h2>

                                    <p>Интернет магазин для любого вида комерции. </p>
                                    <button type="button" class="btn btn-default get">Купить сейчас</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?= '/upload/goods/' . $slide->image ?>"
                                         class="girl img-responsive" alt=""/>
                                    <img src="/eshop/images/home/pricing.png" class="pricing" alt=""/>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории товаров</h2>
                    <?= $this->render('/menu/_category-products', ['modelGoodsCategories' => $modelGoodsCategories]); ?>
                    <!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Бренды</h2>
                        <?= $this->render('/menu/_brands-name', ['modelBrends' => $modelBrends]); ?>
                    </div>
                    <!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>

                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/eshop/images/home/shipping.jpg" alt=""/>
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Список желанных товаров</h2>

                    <?php if($modelCompareList): ?>
                    <?php foreach ($modelCompareList as $good): ?>


                        <div class="col-sm-4" id="wish_good_<?= $good->goods->id  ?>">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="/shop/detail?item=<?= $good->goods->id ?>"><img  src="<?= $Module::getGoodImage($good->goods->image) ?>" alt=""/>

                                            <h2>$<?= $good->price ?></h2>

                                            <p title="<?= $good->goods->item ?>"><?= StringHelper::truncate($good->goods->item,25) ?></p></a>
                                        <a href="javascript:void(0);" onclick="addToCart(<?= $good->goods->id ?>)"
                                           class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i> В корзину</a>
                                    </div>

                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                       <?php $stateOgGood = Wishlist::getWishlistState($good->goods->id ); ?>
                                        <?php if($stateOgGood): ?>
                                            <li><a href="javascript:void(0);" onclick="RemoveFromWishList(<?= $good->goods->id ?>)"><i class="fa fa-minus-square"></i>Удалить из желаний</a></li>
                                        <?php else: ?>
                                            <li><a href="javascript:void(0);" onclick="AddToWishList(<?= $good->goods->id ?>)"><i class="fa fa-minus-square"></i> В список желаний</a></li>
                                        <?php endif; ?>
                                        <li><a href="javascript:void(0);" onclick="RemoveFromCompareList(<?= $good->goods->id ?>)"><i class="fa fa-plus-square"></i>Удалить из сравнений</a></li>
                                    </ul>
                                </div>
                            </div>
                            <style>
                                .product-image-wrapper:hover {
                                / / border : 1 px solid #7b7a7c;
                                    box-shadow: 3px 3px 10px #7b7a7c;
                                    cursor: pointer;
                                }
                            </style>
                        </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-sm-6 col-md-offset-3">
                            <div class="total_area">
                                <ul>
                                    <li style="text-align: center">Список пуст</li>

                                </ul>
                            </div>
                        </div>


                    <?php endif; ?>
                </div>
                <!--features_items-->
                <?= $this->render('/menu/_tabs',['modelGoodsCategories'=> $modelGoodsCategories]); ?>
                <!--/category-tab-->

                <!--recommended_items-->
                <div class="recommended_items">
                    <?= $this->render('/menu/_best',['modelBest'=> $modelBest]); ?>
                </div>
                <!--/recommended_items-->
            </div>
        </div>
    </div>
</section>


