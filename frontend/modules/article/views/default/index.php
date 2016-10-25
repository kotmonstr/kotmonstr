<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use common\models\Comment;
use frontend\assets\AppAsset;
use yii\helpers\Html;
Yii::$app->formatter->locale = 'ru-RU';
//$this->registerJSFile('/js/custom/tooltip.js',['depends'=>AppAsset::className()]);
?>

<div class="container">
    <div class="new-conteiner">
        <div class="row">
            <div class="row">
                <div class="col-md-3">

                    <div class="col-md-12" style="margin-top: 15px">
                        <div class="navbar navbar-inverse " style="min-height: 200px">

                            <div class="navbar-inner" >
                                <h5 style="text-align: center;color: #676061; text-transform: uppercase;" href="javascript:void(0);">Темы</h5>
                            </div>
                            <div style="padding: 10px">

                                <? foreach ($ArticleCategoryModel as $cat): ?>
                                    <a class="dark-link" href="<?= Url::to(['/article/default/index', 'category' => $cat->id]); ?> "><p class="white-p"><?= $cat->name ?> </p></a>
                                <? endforeach; ?>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="row">
                        <? if ($model): ?>
                            <?php foreach ($model as $blog): ?>
                                    <div class="col-md-4">
                                 

                                        <a href="<?= Url::toRoute(['/article/list/'.$blog->slug]); ?>">
                                        <div class="thumbnail">
                                            <img class="img-thumb" src="<?= $blog->src . '/' . $blog->image ?>" alt="...">

                                            <div class="caption">
                                                <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
                                            </div>
<!--                                            <div class="link-to-pdf">-->
<!--                                                <h5 class="caption-header">--><?//= Html::a('Maxseal_flex.pdf','/files/Maxseal_flex.pdf') ?><!--</h5>-->
<!--                                            </div>-->
                                            <div class="caption time">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px"><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <h3>Ничего не найдено</h3>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-sm-9" style="text-align: center">
                    <?=
                    LinkPager::widget([
                        'pagination' => $pages,
                        'maxButtonCount' => 5,
                        'hideOnSinglePage' => true
                    ]);
                    ?>
                    <ul class="pagination">
                        <li class="last"><a
                                href="/article/default/index?page=<?= ceil($pages->totalCount / $pageSize) ?>"
                                data-page="<?= ceil($pages->totalCount / $pageSize) ?>"><?= '...' . ceil($pages->totalCount / $pageSize); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9" style="text-align: center">
                    <h5>Последние</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <? if ($modelLastArticle): ?>
                            <?php foreach ($modelLastArticle as $blog): ?>
                                <div class="col-md-4">


                                        <a href="<?= Url::toRoute(['/article/list/'.$blog->slug]); ?>">
                                        <div class="thumbnail">
                                            <img class="img-thumb" src="<?= $blog->src . '/' . $blog->image ?>"
                                                 alt="...">

                                            <div class="caption">
                                                <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
                                            </div>
                                            <div class="caption time">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px"><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <h3>Ничего не найдено</h3>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9" style="text-align: center">
                    <h5>Популярные</h5>
                </div>
            </div>
            <div class="clearfix"></div>


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <div class="row">
                        <? if ($modeMostWatched): ?>
                            <?php foreach ($modeMostWatched as $blog): ?>
                                <div class="col-md-4">

                                    <a href="<?= Url::toRoute(['/article/list/'.$blog->slug]); ?>">
                                        <div class="thumbnail">
                                            <img class="img-thumb" src="<?= $blog->src . '/' . $blog->image ?>"
                                                 alt="...">

                                            <div class="caption">
                                                <h5 class="caption-header"><?= StringHelper::truncate($blog->title, 63) ?></h5>
                                            </div>
                                            <div class="caption time">
                                                <span class="glyphicon glyphicon-time bold dark-color"
                                                      aria-hidden="true"></span>
                                    <span
                                        class="dark-color"><?= ' ' . Yii::$app->formatter->asDate($blog->created_at, 'short') . ' ' . Yii::$app->formatter->asTime($blog->created_at, 'short') ?></span>
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                          style="margin-left:10px"><?= $blog->view ?></span>
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"
                                          style="margin-left:10px"><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <? endforeach; ?>
                        <? else: ?>
                            <h3>Ничего не найдено</h3>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .white-p{
        color: #ffffff;
        font-size: 12px;
        font-family: "Open Sans", sans-serif;
        font-weight: bold;
        line-height: .7;
        text-transform: uppercase;
        text-shadow: none;
        text-decoration: none;
    }
    .white-p:hover{
        box-shadow: none;
        color: #cf3046;
        background: none;
    }
    .up-header {
        text-align: center;
        background-color: #757171;

        border-radius: 5px 5px 0px 0px;
        padding: 0px 0px 20px 0px;
        margin: 21px -26px 12px -50px;
    }

    .up-header h3 {
        color: #CF3039;
    }

    .time {
        position: absolute !important;
        bottom: 20px;
    }

    .new-conteiner {
        background: url(../img/newsletter-bg.png) 0 0 repeat;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 0px 25px 0px 50px;
        margin: 15px 10px 15px -10px;
    }

    .thumbnail {
        height: 335px;
        line-height: 16px;
        font-size: 14px;
        box-shadow: 1px 3px 8px #122;

    }

    .thumbnail:hover {
        background-color: #fff0ff !important;
    }

    .thumbnail:hover > .img-thumb {
        opacity: 1;

    }

    .img-thumb {
        height: 200px !important;
        opacity: 0.9;
    }

    .caption-header {
        font-size: 16px;
        color: #444;
        font-weight: 600;
        letter-spacing: -1px;
    }

    .dark-color {
        color: #444;
        text-align: center;
    }

    .dark-link {
        color: red;
        cursor: pointer;
    }
    .link-to-pdf a{
        color: #50aef3!important;
    }
    .link-to-pdf a:hover{
        color: red!important;
    }
</style>