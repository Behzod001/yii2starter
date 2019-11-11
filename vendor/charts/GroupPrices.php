<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 12.06.2019
 * Time: 14:03
 */

namespace vendor\charts;


use app\models\Assessment;
use app\models\Groups;

class GroupPrices
{
    public $group;

    public function __construct(Groups $group)
    {
        $this->group = $group;
    }

    public function getPrices()
    {
        $a = [];
        for ($i = 0; $i < $this->group->subject->expired+2; $i++) {
            $a[$i]['y'] = date('Y-m-d', Assessment::getDateByPeriod($this->group->id, $i));
            $a[$i]['a'] = Assessment::getGroupAssessment($this->group->id, $i);
        }
        return $a;
    }
}