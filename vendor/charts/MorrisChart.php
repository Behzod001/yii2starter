<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 09.06.2019
 * Time: 22:15
 */

namespace charts;


use yii\base\Widget;
use yii\helpers\Json;

/**
 * Class MorrisChart
 * @package charts
 *
 * @example  type [ LINE | BAR | AREA ]
 *
 * MorrisChart::widget([
 *   'element' => 'area',
 *   'type' => MorrisChart::LINE,
 * 'data' => [
 *   [y => '2006', a => 100, b => 90],
 *   [y => '2007', a => 75,  b => 65],
 *   [y => '2008', a => 50,  b => 40],
 *   [y => '2009', a => 75,  b => 65],
 *   [y => '2010', a => 50,  b => 40],
 *   [y => '2011', a => 75,  b => 65],
 *   [y => '2012', a => 100, b => 90],
 *   ],
 * 'labels' => ['Series A', 'Series B']
 * ]);
 *
 *
 * @example type DONUT
 * Morris.Donut({
 *   element: 'donut-example',
 *   resize: true,
 *   data: [
 *       {label: "Download Sales", value: 12},
 *       {label: "In-Store Sales", value: 30},
 *       {label: "Mail-Order Sales", value: 20}
 *   ]
 *   });
 */
class MorrisChart extends Widget
{

    const LINE = "Morris.Line";
    const AREA = "Morris.Area";
    const BAR = "Morris.Bar";
    const DONUT = "Morris.Donut";

    public $element;
    public $type = '';
    public $options=[];
    public $data=[];
    public $xkey = 'y';
    public $ykey = ['a'];
    public $labels;

    /**
     * @var bool
     */
    public $resize = true;

    public function init()
    {
        MorrisAsset::register(\Yii::$app->getView());
        parent::init();
    }

    public function run()
    {
        $this->registerClientScripts();
    }

    public function registerClientScripts()
    {
        echo '<div id="'.$this->element.'"></div>';
       $view = \Yii::$app->getView();
       $view->registerJs('
            $(function(){
                '.$this->type.'({
                  element: "'.$this->element.'",
                  resize: '.$this->resize.',
                  data: '.  Json::encode($this->data).',
                  xkey: "'.$this->xkey.'",
                  ykeys: '.Json::encode($this->ykey).',
                  labels: '.Json::encode($this->labels).',
                  xLabels:"month",
//                   xLabelFormat: function(ts) {
//                      var d = new Date(ts);
//                        return d.getYear() + \'/\' + (d.getMonth() + 1) + \'/\' + d.getDay();
//                  },
//                   dateFormat: function (ts) {
//                        var d = new Date(ts);
//                        return d.getYear() + \'/\' + (d.getMonth() + 1) + \'/\' + d.getDay();
//                      }
                    
                });
            });
        ');
    }
}