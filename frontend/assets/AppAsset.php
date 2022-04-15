<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "//fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap",
        "template/css/bootstrap.min.css",
        "template/css/font-awesome.min.css",
        "template/css/elegant-icons.css",
        "template/css/nice-select.css",
        "template/css/jquery-ui.min.css",
        "template/css/owl.carousel.min.css",
        "template/css/slicknav.min.css",
        "template/css/style.css",

    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
    public $js = [
//        "template/js/jquery-3.3.1.min.js",
        'https://cdnjs.cloudflare.com/ajax/libs/lottie-player/1.5.6/lottie-player.js',
        "template/js/bootstrap.min.js",
        "template/js/jquery.nice-select.min.js",
        "template/js/jquery-ui.min.js",
        "template/js/jquery.slicknav.js",
        "template/js/mixitup.min.js",
        "template/js/owl.carousel.min.js",
        "template/js/main.js",
        'js/cart.js',
        'js/liked.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
