<?php if ($model): ?>
        <div class="slider">
            <div class="camera_wrap">
                <?php foreach ($model as $image): ?>
                    <div data-src="<?= $path . $image->name ?>">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif; ?>

