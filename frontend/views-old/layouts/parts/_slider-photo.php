
<div class="slider">
    <div class="camera_wrap">
<?php foreach ($model as $image): ?>
     
            <div data-src="<?= '/upload/multy-thumbs/' . $image->name ?>"></div>


<?php endforeach ?>
    </div>
</div>
