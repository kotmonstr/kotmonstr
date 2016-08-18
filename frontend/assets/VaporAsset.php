<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class VaporAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vapor/vapor/css/bootstrap.min.css',
        'vapor/vapor/css/font-awesome.min.css',
        'vapor/vapor/css/owl.carousel.css',
        'vapor/vapor/css/owl.transitions.css',
        'vapor/vapor/css/animate.css',
        'vapor/vapor/css/hover-min.css',
        'vapor/vapor/css/masterslider.css',
        'vapor/vapor/css/ms-layers-style.css',
        'vapor/vapor/css/ms-skins/light-3/style.css',
        'vapor/vapor/css/ms-skins/black-2/style.css',
        'vapor/vapor/css/loader.css',
        'vapor/vapor/css/styles.css',
        'vapor/vapor/css/responsive.css',

        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700',
        'https://fonts.googleapis.com/css?family=Raleway:400,700,800',
        'https://fonts.googleapis.com/css?family=Open+Sans',

    ];
    public $js = [
        '/vapor/vapor/js/wow.min.js',
        '/vapor/vapor/js/jquery-1.11.1.min.js',
        '/vapor/vapor/js/bootstrap.min.js',
        '/vapor/vapor/js/masterslider.min.js',
        '/vapor/vapor/js/owl.carousel.js',
        '/vapor/vapor/js/owl-slider.js',
        '/vapor/vapor/js/jquery.prettyPhoto.js',
        'https://maps.googleapis.com/maps/api/js',
        '/vapor/vapor/js/custom.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',


    ];
}

