<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_groups".
 *
 * @property int $id
 * @property string $name
 * @property string $src
 * @property int $created
 */
class UserGroups extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE= 1;
    const STATUS_INACTIVE = null;
    const STATUS_CHANGE = 'status_change';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'src'], 'required'],
            [['created'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['src'], 'string', 'max' => 20],
            [['status'], 'integer'],
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
            'src' => Yii::t('app', 'Src'),
            'created' => Yii::t('app', 'Created'),
            'status' => Yii::t('app', 'Created'),
        ];
    }
    public function scenarios()
    {
        $scenarios =  parent::scenarios();
        $scenarios[self::STATUS_CHANGE] = ['status'];
        return $scenarios;
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created = time();
            $this->status = self::STATUS_ACTIVE;
        }
        return parent::beforeSave($insert);
    }
    public function afterFind()
    {
        $this->created = date('d-M-Y',$this->created);
        parent::afterFind();

    }

    /**
     * @return string
     */
    public function statusLabel()
    {
        $status = "";
        if ($this->status) {
            $status = "<span class='label label-success'>" . Yii::t('app', 'Active') . "</span>";
        } else
            $status = '<span class="label label-danger">' . Yii::t('app', 'Inactive') . '</span>';
        return $status;
    }

    public function statusChange(){
        $this->scenario = self::STATUS_CHANGE;
        if ($this->status == self::STATUS_ACTIVE){
            $this->stateDown();
        }
        else $this->stateUp();
        return true;
    }
    public function stateUp(){
        $this->status = self::STATUS_ACTIVE;
    }
    public function stateDown(){
        $this->status = self::STATUS_INACTIVE;
    }
}
