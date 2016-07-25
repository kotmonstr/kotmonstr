<?
use frontend\assets\ShopAsset;

$this->registerJsFile('/js/custom/init-carousel.js', ['depends' => ShopAsset::className()]);
$i = 0;
$ii = 0;
$a = 0;
$line = 1;
$arrIMAGES = [];
$count = count($model);
$Iterator = ceil($count / 4);


foreach ($model as $item) {//9

    $i++;
    if ($i > 4) {
        $line++;
        $i = 1;
    }
    $arrIMAGES[] = $item->image;

}


//vd($arrIMAGES, false);
?>
<div class="new-conteiner">
    <div class="row">
        <div class="col-md-12" style="text-align: center">

                <div id="myCarousel" class="carousel slide">

                    <ol class="carousel-indicators clearfix" >
                        <? for ($b = 1; $b <= $Iterator; $b++): ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $b ?>"
                                class="<?= $b == 1 ? 'active' : null ?>"></li>
                        <? endfor; ?>
                    </ol>


                    <? $i = 0; ?>
                    <div class="carousel-inner">
                        <? foreach ($arrIMAGES as $image): ?>
                            <? $i++; ?>
                            <? $ii++; ?>
                            <? $active = $ii == 1 ? 'active': 'nonactive'; ?>
                            <?= ($i == 1) ? '<div class="item '.$active. ' "><div class="row-fluid">' : null ?>
                            <div class="span3" title=""><a href="#x" class="thumbnail thumbnail-carousel"><img src="<?= $image ?>"
                                                                                            alt="Image"
                                                                                            style="max-height:160px;"/></a>
                   </div>
                            <? if ($i == 4 || $count == $ii) echo '</div></div>';
                            if ($i == 4) {
                                $i = 0;
                            }
                            ?>


                        <? endforeach; ?>
                    </div><!--/carousel-inner-->

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                </div><!--/myCarousel-->


        </div>
    </div>
</div>

<style>
    .thumbnail-carousel{
        height: 170px!important;
    }
    .carousel-indicators{
        bottom: -36px;
    }
    .carousel {
        margin-bottom: 0;
        padding: 0 40px 30px 40px;
    }
    /* Reposition the controls slightly */
    .carousel-control {
        left: -12px;
    }
    .carousel-control.right {
        right: -12px;
    }
    /* Changes the position of the indicators */
    .carousel-indicators {
        //right: 50%;
       //top: auto;
        //bottom: 0px;
        //margin-right: -19px;
    }
    /* Changes the colour of the indicators */
    .carousel-indicators li {
        background: #c0c0c0;
    }
    .carousel-indicators .active {
        background: #333333;
    }
    .carousel {
        margin-left: 20px;
</style>