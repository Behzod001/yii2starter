<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 09.06.2019
 * Time: 22:15
 */

namespace charts;



use yii\web\AssetBundle;

class MorrisAsset extends AssetBundle
{
    public $sourcePath = '@charts/assets';
    public $baseUrl = '@web';

    public $css=[
        'morris.css',
    ];
    public $js=[
        'raphael-min.js',
        'morris.min.js',
    ];

    public $depends = [
        'app\assets\AppAsset',
    ];
}