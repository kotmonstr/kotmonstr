<?php
use yii\helpers\Url;
use common\models\VideoCategoria;
use common\models\Author;


$model_author = Author::getListAuthorNonEmpty();
$model_video = VideoCategoria::getModelNonEmpty();

$url = Yii::$app->controller->module->id . '/' . Yii::$app->controller->action->id;
$module = Yii::$app->controller->module->id;

//vd($url);
?>
<ul class="nav sf-menu">
    <li class="li-first <?php
    if ($url == 'site/index') {
        echo "active";
    }
    ?>"><a href="<?= Url::to('/') ?>"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>

    <? if ($model_author): ?>
        <li class="sub-menu <?php
        if ($url == 'video/show-author') {
            echo "active";
        }
        ?>">
            <a href="javascript:void(0);">Авторы</a>
            <ul>
                <?php foreach ($model_author as $author): ?>
                    <li><a href="<?= Url::to(['/video/author/' . $author->slug]) ?>"><?= $author->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <? endif; ?>

    <? if ($model_video): ?>
        <li class="sub-menu <?php
        if ($url == 'video/view') {
            echo "active";
        }
        ?>"><a href="javascript:void(0);">Видео</a>
            <ul>
                <?php foreach ($model_video as $categoria): ?>
                    <li><a href="<?= Url::to(['/video/view/' . $categoria->slug]); ?>"><?= $categoria->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <? endif; ?>

    <li class="sub-menu <?= $url == 'video/tv24' || $url == 'video/tv1' || $url == 'video/5canal' ? "active" : ''; ?>">
        <a href="javascript:void(0);">ТВ</a>
        <ul>
            <li><a href="<?= Url::to('/video/tv24') ?>">РОССИЯ 24</a></li>
            <li><a href="<?= Url::to('/video/tv1') ?>">РОССИЯ 1</a></li>
            <!--<li><a href="<?= Url::to('/video/tvc') ?>">TBЦ</a></li>-->
            <li><a href="<?= Url::to('/video/5canal') ?>">5 КАНАЛ'</a></li>
        </ul>
    </li>


    <li class="<?= $url == 'image/preview' ? 'active' : ''; ?>"><a href="<?= Url::to('/images') ?>">Фотографии</a></li>
    <li class="<?= $url == 'blog/index' || $url == 'blog/views' ? 'active' : ''; ?>"><a href="<?= Url::to('/news') ?>">Новости</a>
    </li>
    <li class="<?= $url == 'article/index' || $url == 'article/views' ? 'active' : ''; ?>"><a
            href="<?= Url::to('/blog') ?>">Статьи</a></li>
    <li class="<?= $url == 'music/show' ? 'active' : ''; ?>"><a href="<?= Url::to('/music') ?>">Музыка</a></li>
    <li class="<?= $url == 'book/views' ? 'active' : ''; ?>"><a href="<?= Url::to('/books') ?>">Книги</a></li>
    <li style="display: none"><a href="<?= Url::to('/sitemap.xml') ?>">Sitemap</a></li>


    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->id == 1 || !Yii::$app->user->isGuest && Yii::$app->user->id == 2 || !Yii::$app->user->isGuest && Yii::$app->user->id == 3) { ?>
        <li><a href="<?= Url::to('/admin') ?>">Админка</a></li><?php } ?>
    <?php if (Yii::$app->user->isGuest) { ?>
        <li><a href="<?= Url::to('/signup') ?>">Регистрация</a></li>
        <li><a href="<?= Url::to('/login') ?>">Вход</a></li>
    <?php } else { ?>
    <li><a href="<?= Url::to('/logout') ?>">Выход</a>
        <?php } ?>
</ul>