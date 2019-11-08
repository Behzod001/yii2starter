<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 02.06.2019
 * Time: 20:30
 */

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lang".
 *
 * @property integer $id
 * @property string $url
 * @property string $local
 * @property string $name
 * @property integer $defaultl
 * @property integer $date_update
 * @property integer $date_create
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'local', 'name', 'date_update', 'date_create'], 'required'],
            [['defaultl', 'date_update', 'date_create'], 'integer'],
            [['url', 'local', 'name'], 'string', 'max' => 255]
        ];
    }
//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'attributes' => [
//                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
//                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
//                ],
//            ],
//        ];
//    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => Yii::t('app', 'Url'),
            'local' => Yii::t('app', 'Local'),
            'name' => Yii::t('app', 'Name'),
            'defaultl' => Yii::t('app', 'Default'),
            'date_update' => Yii::t('app', 'Date update'),
            'date_create' => Yii::t('app', 'Date create'),
        ];
    }

    public static $current = null;

    public static function getCurrent()
    {
        if (self::$current === null) {
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

    public static function setCurrent($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        // var_dump(self::$current);exit;
        Yii::$app->language = self::$current->url;
    }

    public static function getDefaultLang()
    {
        $l = false;
        if (!Yii::$app->getUser()->isGuest) {
            $lang = Yii::$app->getUser()->getIdentity()->lang;
            $l = Lang::find()->where("url = :url", [":url" => $lang])->one();
        }
        if ($l) return $l; else
            return Lang::find()->where("defaultl = :default", [":default" => 1])->one();
    }

    public static function getLangByUrl($url = null)
    {
        if ($url === null) {
            return null;
        } else {

            $language = Lang::find()->where(['url' => $url])->one();
            if ($language === null) {
                return null;
            } else {
                return $language;
            }
        }
    }

    public static function getDropDown()
    {
        $items = self::find(['url', "name"])->all();
        return ArrayHelper::map($items, "url", "name");
    }
}
