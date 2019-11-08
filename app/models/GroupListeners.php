<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_listeners".
 *
 * @property int $id
 * @property int $group_id
 * @property int $listener_id
 *
 * @property Groups $group
 * @property User $listener
 */
class GroupListeners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_listeners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'listener_id'], 'required'],
            [['group_id', 'listener_id'], 'integer'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['listener_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['listener_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Guruh',
            'listener_id' => 'Tinglovchi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListener()
    {
        return $this->hasOne(User::className(), ['id' => 'listener_id']);
    }

    public function getAllListeners(){
        return self::find()->where(['group_id'=>$this->id])->count();
    }
}
