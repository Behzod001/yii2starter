<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assessment".
 *
 * @property int $id
 * @property int $listeners_id
 * @property double $price
 * @property int $period
 * @property int $group_id
 *
 * @property Groups $group
 * @property User $listeners
 */
class Assessment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assessment';
    }

    public static function getDateByPeriod($groupId, $i)
    {
         return  (self::find()->where(['group_id'=>$groupId,'period'=>$i])->one())->date;
    }

    public static function getMaxPeriod()
    {
        return 8;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['listeners_id', 'period', 'group_id'], 'required'],
            [['listeners_id', 'period', 'group_id'], 'integer'],
            [['price'], 'number'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['listeners_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['listeners_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'listeners_id' => 'Listeners ID',
            'price' => 'Price',
            'period' => 'Period',
            'group_id' => 'Group ID',
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
    public function getListeners()
    {
        return $this->hasOne(User::className(), ['id' => 'listeners_id']);
    }

    public static function getGroupAssessment($groupId, $periodId )
    {
        return self::find()
            ->where(['group_id'=>$groupId,'period'=>$periodId])
            ->sum('price');

    }


    public static function getTeacherAssessment( $groupId, $teacherId, $subjectId, $periodId )
    {
        return self::find()
            ->where(['teacher_id'=>$teacherId,'subject_id'=>$subjectId])
            ->andWhere(['group_id'=>$groupId,'period'=>$periodId])
            ->sum('price');

    }
}
