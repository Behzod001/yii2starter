<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $name
 * @property int $listeners
 * @property int $subject_id
 *
 * @property Subject $subject
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    public static function dropList()
    {
        return ArrayHelper::map(self::find()->orderBy(['id'=>SORT_DESC])->all(),'id','name');
    }

    public static function groupsCount()
    {
        return self::find()->where(['company_id' => Yii::$app->company->id])->count();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'listeners', 'subject_id', 'company_id'], 'required'],
            [['listeners', 'subject_id', 'company_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['start_day','end_day'],'safe'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app','Name'),
            'listeners' => Yii::t('app','Listeners'),
            'subject_id' => Yii::t('app','Subject'),
            'company_id' => Yii::t('app','Teching center'),
            'start_day' => Yii::t('app','Start day'),
            'end_day' => Yii::t('app','End day'),
        ];
    }
    public function beforeSave($insert)
    {
        if($insert){
            $this->company_id = Yii::$app->user->identity->company->id;
        }

        $this->start_day =(is_string($this->start_day))? strtotime($this->start_day):$this->start_day;
        $this->end_day =(is_string($this->end_day))? strtotime($this->end_day):$this->end_day;
        return parent::beforeSave($insert);
    }
    public function afterFind()
    {
        parent::afterFind();
        $this->start_day = date('d-m-Y',$this->start_day);
        $this->end_day = date('d-m-Y',$this->end_day);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }
    public function getAllListeners(){
        return GroupListeners::find()->where(['group_id'=>$this->id])->count();
    }

    public function getValueNow()
    {
//        valuenow
        return rand($this->subject->expired, 100);
    }
}
