<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SignAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        <!-- Base Css Files -->
        "/src/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css",
        "/src/assets/libs/bootstrap/css/bootstrap.min.css",
        "/src/assets/libs/font-awesome/css/font-awesome.min.css",
        "/src/assets/libs/fontello/css/fontello.css",
        "/src/assets/libs/animate-css/animate.min.css",
        "/src/assets/libs/nifty-modal/css/component.css",
        "/src/assets/libs/magnific-popup/magnific-popup.css",
        "/src/assets/libs/ios7-switch/ios7-switch.css",
        "/src/assets/libs/pace/pace.css",
        "/src/assets/libs/sortable/sortable-theme-bootstrap.css",
        "/src/assets/libs/bootstrap-datepicker/css/datepicker.css",
        "/src/assets/libs/jquery-icheck/skins/all.css",
//        <!-- Code Highlighter for Demo -->
        "/src/assets/libs/prettify/github.css",

//                <!-- Extra CSS Libraries Start -->
        "/src/assets/css/style.css",
//                <!-- Extra CSS Libraries End -->
        "/src/assets/css/style-responsive.css",

    ];
    public $js = [
//        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    "/src/assets/libs/jquery/jquery-1.11.1.min.js",
	"/src/assets/libs/bootstrap/js/bootstrap.min.js",
	"/src/assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js",
	"/src/assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js",
	"/src/assets/libs/jquery-detectmobile/detect.js",
	"/src/assets/libs/jquery-animate-numbers/jquery.animateNumbers.js",
	"/src/assets/libs/ios7-switch/ios7.switch.js",
	"/src/assets/libs/fastclick/fastclick.js",
	"/src/assets/libs/jquery-blockui/jquery.blockUI.js",
	"/src/assets/libs/bootstrap-bootbox/bootbox.min.js",
	"/src/assets/libs/jquery-slimscroll/jquery.slimscroll.js",
	"/src/assets/libs/jquery-sparkline/jquery-sparkline.js",
	"/src/assets/libs/nifty-modal/js/classie.js",
	"/src/assets/libs/nifty-modal/js/modalEffects.js",
	"/src/assets/libs/sortable/sortable.min.js",
	"/src/assets/libs/bootstrap-fileinput/bootstrap.file-input.js",
	"/src/assets/libs/bootstrap-select/bootstrap-select.min.js",
	"/src/assets/libs/bootstrap-select2/select2.min.js",
	"/src/assets/libs/magnific-popup/jquery.magnific-popup.min.js",
	"/src/assets/libs/pace/pace.min.js",
	"/src/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js",
	"/src/assets/libs/jquery-icheck/icheck.min.js",

//	<!-- Demo Specific JS Libraries -->
	"/src/assets/libs/prettify/prettify.js",

	"/src/assets/js/init.js",


    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//    ];
}
