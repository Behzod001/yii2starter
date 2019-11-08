<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher_chart".
 *
 * @property int $id
 * @property int $teaher_id
 * @property int $subject_id
 * @property int $period
 * @property int $price
 */
class TeacherChart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_chart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teaher_id', 'subject_id', 'period', 'price'], 'required'],
            [['teaher_id', 'subject_id', 'period', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teaher_id' => Yii::t('app', 'Teaher ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'period' => Yii::t('app', 'Period'),
            'price' => Yii::t('app', 'Price'),
        ];
    }
}
