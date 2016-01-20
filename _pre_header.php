<?php

use backend\assets\AppAsset;
use yii\bootstrap\BootstrapAsset;

AppAsset::register($this);
$this->registerCssFile('/css/bootstrap.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('/css/responsive.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('/css/camera.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('/css/style.css', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700', ['depends' => BootstrapAsset::className()]);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Kaushan+Script:400', ['depends' => BootstrapAsset::className()]);


$this->registerJsFile('/js/jquery.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/jquery.easing.1.3.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/camera.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/jquery.ui.totop.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/jquery.mobile.customized.min.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/bootstrap.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/custom/index.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/superfish.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/custom/header.js', ['depends' => AppAsset::className()]);


//$this->registerJsFile('/js/forms.js', ['depends' => AppAsset::className()]);
$this->registerJsFile('/js/jquery.cookie.js', ['depends' => AppAsset::className()]);

?>

