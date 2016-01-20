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
class ShopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'eshop/css/bootstrap.min.css',
        'eshop/css/font-awesome.min.css',
        'eshop/css/prettyPhoto.css',
        'eshop/css/price-range.css',
        'eshop/css/animate.css',
        'eshop/css/main.css',
        'eshop/css/responsive.css',
    ];
    public $js = [
       // 'eshop/js/jquery.js',//   с ним не работают active form
        'eshop/js/bootstrap.min.js',
        'eshop/js/jquery.scrollUp.min.js',
        'eshop/js/price-range.js',
        'eshop/js/jquery.prettyPhoto.js',
        'eshop/js/main.js',
        'eshop/js/jquery.zoom.js',
        'eshop/js/custom.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
