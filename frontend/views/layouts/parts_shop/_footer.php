<?php
use yii\helpers\StringHelper;

Yii::$app->formatter->locale = 'ru-RU';
?>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">

                    <?php foreach($modelYoutube as $video): ?>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="http://img.youtube.com/vi/<?= $video->youtube_id ?>/mqdefault.jpg" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p><?= StringHelper::truncate($video->title, 15); ?></p>
                            <h2><?=Yii::$app->formatter->asDate($video->created_at,'long')?></h2>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/eshop/images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Услуги</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Помощь</a></li>
                            <li><a href="#">Связаться с нами</a></li>
                            <li><a href="#">Статус заказа</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Условия</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Доставка</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Возврат средств</a></li>
                            <li><a href="#">Платежные системы</a></li>
                            <li><a href="#">Скидки</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>О магазине</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>О нас</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © <?= date("Y"); ?> KOTMONSTR-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.Kotmonstr.com">Kotmonstr</a></span></p>
            </div>
        </div>
    </div>

</footer>