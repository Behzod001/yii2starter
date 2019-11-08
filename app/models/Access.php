<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "access".
 *
 * @property int $user_id
 * @property int $group_id
 * @property int $created
 */
class Access extends \yii\db\ActiveRecord
{
    const LISTENER = "LISTENER";
    const TEACHER = "TEACHER";
    const CENTER = "CENTER";
    const ADMIN = "ADMIN";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id'], 'required'],
            [['user_id', 'group_id', 'created'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User'),
            'group_id' => Yii::t('app', 'Group'),
            'created' => Yii::t('app', 'Created'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created = time();
        }
        return parent::beforeSave($insert);
    }
    public function getAccess(){
        return $this->hasOne(UserGroups::className(),['id'=>'group_id']);
    }
}
