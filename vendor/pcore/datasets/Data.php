<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 23.03.2019
 * Time: 14:19
 */

namespace pcore\datasets;


use app\models\Assessment;
use yii\helpers\ArrayHelper;

class Data
{
    public static function getDataAsArray($user, $group)
    {
        $array = Assessment::findAll(['listeners_id' => $user, 'group_id' => $group]);
        if (is_array($array)) {
            for ($index = 0; $index < count($array); $index++)
                foreach ($array as $item) {
                    if ($index == $item->period) {
                        $data[$index] = $item->price;
                        break;
                    }
                }
            return $data;
        } else {
            return [
                $array->price
            ];
        }
    }
}