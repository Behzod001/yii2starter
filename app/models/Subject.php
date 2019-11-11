<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name
 * @property string $period
 * @property int $expired
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    public static function subjectsCount()
    {
        return self::find()->where(['company_id' => Yii::$app->company->id])->count();
    }

    public static function getNames()
    {
        return [
            0=>'a',
            1=>'b',
            2=>'c',
            3=>'d',
            4=>'e',
            5=>'f',
            6=>'g',
            7=>'h',
            8=>'i',
            9=>'j',
            10=>'k',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'expired', 'period', 'company_id'], 'required'],
            [['name','period'], 'string', 'max' => 512],
            [['expired', 'company_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Fan nomi',
            'expired' => 'Muddati',
            'period' => 'Oraliq muddati',
            'company_id' => 'O\'quv markazi',
        ];
    }

    public static function dropList(){
        return ArrayHelper::map(self::find()->all(),'id','name');
    }

    public function getPeriods()
    {
        return ceil($this->expired / $this->period);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
}
