<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_groups".
 *
 * @property int $id
 * @property int $subject_id
 * @property int $group_id
 * @property double $assessment
 * @property int $date
 */
class SubjectGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'group_id', 'assessment', 'date'], 'required'],
            [['subject_id', 'group_id', 'date'], 'integer'],
            [['assessment'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_id' => 'Subject ID',
            'group_id' => 'Group ID',
            'assessment' => 'Price',
            'date' => 'Date',
        ];
    }
    public function beforeSave($insert)
    {
       if($this->isNewRecord){
           $this->date = time();
       }
       return parent::beforeSave($insert);
    }
}
