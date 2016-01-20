<img class="banner-paddig" src="/eshop/images/home/shipping.jpg" alt=""/>
<?php foreach($modelBanner as $banner):?>
<a href="<?= $banner->link ? $banner->link : 'javascript:void(0);'?>"><img class="banner-paddig" src="<?= '/upload/banner-thumbs/'. $banner->name ?>" alt=""/></a>

<?php endforeach ?>

<style>
    .banner-paddig{
        margin-bottom: 20px;
    }
</style>