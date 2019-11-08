<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $created
 * @property string $address
 * @property string $logo
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'logo'], 'required'],
            [['created'], 'safe'],
            [['name'], 'string', 'max' => 128],
            [['address', 'logo'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'created' => Yii::t('app', 'Created'),
            'address' => Yii::t('app', 'Address'),
            'logo' => Yii::t('app', 'Logo'),
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created = time();
        }

        $this->created = (is_string($this->created)) ? strtotime($this->created) : $this->created;

        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $this->created = date('d-m-Y', $this->created);
        parent::afterFind();
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['company_id' => 'id']);
    }

    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['company_id' => 'id']);
    }

    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['company_id' => 'id']);
    }
}
