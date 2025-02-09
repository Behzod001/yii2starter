<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;
use app\modules\admin\modelsUserGroup;
use app\modules\admin\modelsUserFaculty;
/**
 * This is the model class for table "user_profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string $lastname
 * @property string $middlename
 * @property string $avatar
 * @property string $group
 * @property int $created
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['avatar'], 'required'],
            [['user_id', 'created', 'group', 'faculty', 'birth', 'gender','members_id','updated'], 'integer'],
            [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['username', 'lastname', 'middlename'], 'string', 'max' => 50],
            [['unity','city_address','street_address','home_address'], 'string', 'max' => 512],
            [['avatar'], 'string', 'max' => 1024],
        ];
    }
   
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'username' => Yii::t('app', 'Username'),
            'lastname' => Yii::t('app', 'Lastname'),
            'middlename' => Yii::t('app', 'Middlename'),
            'avatar' => Yii::t('app', 'Avatar'),
            'birth' => Yii::t('app', 'Birth'),
            'group' => Yii::t('app', 'Group'),
            'faculty' => Yii::t('app', 'Faculty'),
            'gender' => Yii::t('app', 'Gender'),

            'unity' => Yii::t('app', 'University'),
            'city_address' => Yii::t('app', 'City address'),
            'street_address' => Yii::t('app', 'Street address'),
            'home_address' => Yii::t('app', 'Home address'),

            'created' => Yii::t('app', 'Created'),
            'members_id' => Yii::t('app', 'Members num'),
            'updated' => Yii::t('app', 'Updated'),
        ];
    }
    public static function isMember(){
        $user = Yii::$app->user;
        $ismember = self::findOne(['user_id' => $user->id]);
        if(!isset($ismember))return true;else return false;
    }
    public function makeFIO(){
        $fio = $this->lastname .' '. $this->username;
        return $fio;
    }
    public function beforeSave($insert)
    {
        if($insert){

            $this->birth =(is_string($this->birth))? strtotime($this->birth): $this->birth;
            $this->created = time();
        }else{$this->created =(is_string($this->created))? strtotime($this->created): time();}
        return parent::beforeSave($insert);
    }
    public function afterFind()
    {
        $this->created = date('d-m-Y');
        $this->birth = date('d-M-Y');
        parent::afterFind(); // TODO: Change the autogenerated stub
    }
    public static function StCount($faculty_id){
        // var_dump($faculty_id);exit;
        return self::find()->select('faculty')->joinWith('userFaculty')->where(['faculty' => $faculty_id])->asArray()->count();
    }

    public function getUserGroup()
    {
        return $this->hasOne(UserGroup::className(), ['id' => 'group']);
    }
    public function getUserFaculty()
    {
        return $this->hasOne(UserFaculty::className(), ['id' => 'faculty']);
    }
    
    public function getPosts()
    {
        return $this->hasOne(UserProfile::className(), ['id' => 'user_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getPosition()
    {
        return $this->hasOne(UserPosition::className(), ['user_id' => 'user_id']);
    }
    public static function count(){
        return self::find()->count();
    }
}
