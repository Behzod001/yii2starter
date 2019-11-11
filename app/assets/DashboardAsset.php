<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    "/src/assets/libs/rickshaw/rickshaw.min.css",
    "/src/assets/libs/morrischart/morris.css",
    "/src/assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css",
    "/src/assets/libs/jquery-clock/clock.css",
    "/src/assets/libs/bootstrap-calendar/css/bic_calendar.css",
    "/src/assets/libs/sortable/sortable-theme-bootstrap.css",
    "/src/assets/libs/jquery-weather/simpleweather.css",
    "/src/assets/libs/bootstrap-xeditable/css/bootstrap-editable.css",
    "/src/assets/css/style.css",
    ];
    public $js = [
	"/src/assets/libs/d3/d3.v3.js",
	"/src/assets/libs/rickshaw/rickshaw.min.js",
	"/src/assets/libs/raphael/raphael-min.js",
	"/src/assets/libs/morrischart/morris.min.js",
	"/src/assets/libs/jquery-knob/jquery.knob.js",
	"/src/assets/libs/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js",
	"/src/assets/libs/jquery-jvectormap/js/jquery-jvectormap-us-aea-en.js",
	"/src/assets/libs/jquery-clock/clock.js",
	"/src/assets/libs/jquery-easypiechart/jquery.easypiechart.min.js",
	"/src/assets/libs/jquery-weather/jquery.simpleWeather-2.6.min.js",
	"/src/assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js",
	"/src/assets/libs/bootstrap-calendar/js/bic_calendar.min.js",
	"/src/assets/js/apps/calculator.js",
	"/src/assets/js/apps/todo.js",
	"/src/assets/js/apps/notes.js",
	"/src/assets/js/pages/index.js",
    ];
    public $jsOptions=[
        'position'=> View::POS_END
    ];

}
