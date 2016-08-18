<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\StringHelper;
use common\models\Comment;
?>
<!-- start blog section-->
<div id="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="blog-text">
                    <h1>Новости</h1>
                    <p class="wow fadeInDown" data-wow-duration="0.3s">Kotmonstr <span class="h4-style">Новости</span></p>
                </div>
            </div>
        </div>
        <div id="blog-images">
            <div class="row">

                <? if(isset($model)): ?>
                <?php foreach ($model as $blog):
                $image = $blog->image;
                if ($image == '') {
                    $image = "/img-custom/default.jpg";
                }
                ?>

                <div class="col-md-4 col-sm-6 col-sm-offset-3 col-xs-offset-0 col-md-offset-0" style="margin-bottom: 10px">
                    <div class="blog-image wow fadeIn" data-wow-duration="1s">
                        <img src="<?= $image ?>" alt="blog <?= StringHelper::truncate($blog->title, 1790) ?>" style="height: 230px">
                        <div class="blog-text">
                            <h1>
                                <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]); ?>"><?= StringHelper::truncate($blog->title, 70) ?></a>
                            </h1>
                            <p><?= StringHelper::truncate($blog->content, 190) ?></p>
                            <a href="<?= Url::toRoute(['/blog/list/'.$blog->slug]); ?>">read more</a>
                            <hr>
                            <div class="blog-socials">
                                <i class="fa fa-clock-o"></i>
                                <p><?= Yii::$app->formatter->asDate($blog->created_at, 'long') ?></p>
                                <i class="fa fa-user"></i>
                                <p><?= $blog->view ?></p>
                                <i class="fa fa-comments"></i>
                                <p><?= Comment::getMessagesQuantityByBlogId($blog->id) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <? endforeach; ?>

                    <div class="col-sm-12" style="text-align: center">
                        <?=
                        LinkPager::widget([
                            'pagination' => $pages,
                            'maxButtonCount' => 5,
                        ]);
                        ?>
                        <ul class="pagination">
                            <li class="last"><a href="/blog/default/index?page=<?= ceil($pages->totalCount / $pageSize) ?>"
                                                data-page="<?= ceil($pages->totalCount / $pageSize) ?>"><?= '...' . ceil($pages->totalCount / $pageSize); ?></a>
                            </li>
                        </ul>
                    </div>

                <? endif; ?>





            </div>
        </div>
    </div>
</div>
<!-- end blog section-->