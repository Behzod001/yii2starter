<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_teachers".
 *
 * @property int $id
 * @property int $group_id
 * @property int $teacher_id
 * @property int $company_id
 */
class GroupTeachers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'teacher_id', 'company_id'], 'required'],
            [['group_id', 'teacher_id', 'company_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_id' => Yii::t('app', 'Group'),
            'teacher_id' => Yii::t('app', 'Teacher'),
            'company_id' => Yii::t('app', 'Company'),
        ];
    }
    public function getTeacher()
    {
        return $this->hasOne(Listeners::className(), ['id' => 'teacher_id']);
    }
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }
    public function getAllListeners(){
        return GroupListeners::find()->where(['group_id'=>$this->group_id])->count();
    }
}
