<?php
  use common\models\Goods;
?>

<div class="brands-name">
    <ul class="nav nav-pills nav-stacked">

        <?php foreach($modelBrends as $brend): ?>
            <?php  $quantity = count(Goods::getQuantityOfGoodsByBrand($brend->id)); ?>
        <li><a class="bold_and_ellow" href="javascript:void(0);" onclick="getGoodsByBrend(<?= $brend->id; ?>)"> <span class="pull-right">(<?= $quantity ?>)</span><?= $brend->name ?></a></li>


        <?php endforeach; ?>

    </ul>
</div>