<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\NewsletterForm;
use yii\helpers\Html;

;

$model = new NewsletterForm;
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="span4 float2">


            </div>
            <div class="span8 float">
                <ul class="footer-menu">
                    <li><a href="<?= Url::to('/') ?>" class="current">Главная</a>|</li>
                    <li><a href="<?= Url::to('/news') ?>">Новости</a>|</li>
                    <li><a href="<?= Url::to('/video/tv24') ?>">Тв</a>|</li>
                    <li><a href="<?= Url::to('/images') ?>">Фотографии</a>|</li>
                    <li><a href="<?= Url::to('/article') ?>">Статьи</a>|</li>
                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == 1 || !Yii::$app->user->isGuest && Yii::$app->user->id == 2 || !Yii::$app->user->isGuest && Yii::$app->user->id == 3) { ?><li><a href="<?= Url::to('/admin/index') ?>">Админка</a></li><?php } ?>
                </ul>
                Kotmonstr  &copy;  <?= date("Y", time()); ?>  |   <a href="/site/index">Privacy Policy</a> |
                <!-- Yandex.Metrika informer --> <a href="https://metrika.yandex.ru/stat/?id=35920145&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/35920145/3_1_FFFFFFFF_FFFFFFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:35920145,lang:'ru'});return false}catch(e){}" /></a> <!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter35920145 = new Ya.Metrika({ id:35920145, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/35920145" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
            </div>
        </div>
    </div>
</footer>
<style>
    .btn_ {
        //float: right;
        font-size: 8px;
        margin-top: 0px;
        margin-left: 224px;
        position: absolute;
        /* float: right; */
        //right: 58px;
        /* top: -3px; */
    }
    .help-block{
        color: #a94442;
        position: absolute;
        /* border: 1px solid red; */
        width: 150px;
        top: 16px;
        font-size: 9px;
        isplay: block;
        margin-bottom: 10px;
    }
</style>
