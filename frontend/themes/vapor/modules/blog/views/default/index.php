
<?= $this->render('@themes/vapor/views/layouts/parts/_blog-section',['model'=> $model,'pages'=>$pages,'pageSize'=> $pageSize]) ?>
<?= $this->render('@themes/vapor/views/layouts/parts/_below-blog',['title_1'=>'Последние','title_2'=>'Новости','text'=>'Самые свежие горячие новости мира и Росии.']) ?>
<?= isset($modelLastBlog) && $modelLastBlog != null ? $this->render('@themes/vapor/views/layouts/parts/_parts',['model'=> $modelLastBlog]) : NULL ?>
<?= $this->render('@themes/vapor/views/layouts/parts/_black-line',['title_1'=>'Популярные','title_2'=>'Новости','text'=>'Самые свежие горячие новости мира и Росии.']) ?>
<?= isset($modeMostWatched) && $modeMostWatched != null ? $this->render('@themes/vapor/views/layouts/parts/_trails',['model'=> $modeMostWatched]) : NULL ?>
