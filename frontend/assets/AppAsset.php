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
        'css/site.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap',
        'https://unpkg.com/aos@2.3.1/dist/aos.css',
    ];
    public $js = [
        'https://unpkg.com/aos@2.3.1/dist/aos.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
