<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 02.06.2019
 * Time: 20:28
 */

namespace app\components;


use yii\web\UrlManager;
use app\models\Lang;
use Yii;

class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {

        if (isset($params['lang_id'])) {
            $lang = Lang::findOne($params['lang_id']);
            if ($lang === null) {
                $lang = Lang::getDefaultLang();
            }
            Yii::$app->language = $params['lang_id'];
            unset($params['lang_id']);

        } else {

            $lang = Lang::getCurrent();
        }
        if (isset($params['relate_to_user'])) {

        }
        $url = parent::createUrl($params);
        if ($url == '/') {
            return '/' . $lang->url;
        } else {
            return $url;
        }
    }
}