<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 02.06.2019
 * Time: 20:27
 */

namespace app\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\IntegrityException;

class Url
{
    public static function to($url)
    {
        return "/" . Yii::$app->language . "/" . $url;
    }

    public static function getMain()
    {
        $url = Yii::$app->request->url;
        $m = explode("?", $url);
        if (!empty($m)) $url = $m[0];
        return $url;
    }

    public static function base()
    {
        try {
            return Yii::$app->getUrlManager()->getBaseUrl();
        } catch (InvalidConfigException $e) {
            throw new IntegrityException($e);
        }
    }
}