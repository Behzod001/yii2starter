<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $lastname
 * @property string $firstname
 * @property string $avatar
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $created
 * @property integer $status
 * @property string $authKey
 * @property string $accessToken
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    CONST STATUS_ACTIVE = 1;
    CONST STATUS_INACTIVE = 0;

    public $remberme = true;
    public $lock_password;
    public $lang;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function dropList()
    {
        return ArrayHelper::map(self::find()->where(['company_id'=>null])->orderBy(['id'=>SORT_DESC])->all(),'id','firstname');
    }
    public static function dropListTeachers()
    {
        return ArrayHelper::map(self::find()->where(['role'=>Listeners::TEACHER])->orderBy(['id'=>SORT_DESC])->all(),'id','firstname');
    }

    public static function usersCount()
    {
        return self::find()->where(['status' => self::STATUS_ACTIVE, 'company_id' => Yii::$app->company->id])->count();
    }

    public function rules()
    {
        return [
            [['password', 'email'], 'required'],
            [['status', 'created', 'role', 'company_id'], 'integer'],
            [['password'], 'string', 'max' => 1024],
            [['firstname', 'lastname'], 'string', 'max' => 25],
            [['authKey', 'accessToken'], 'string', 'max' => 512],
        ];
    }

    public function getGroup(){
        return $this->hasMany(GroupListeners::className(),['listener_id'=>'id']);
    }

    public function attributeLabels()
    {
        return [
            'firstname' => 'Ismi',
            'lastname' => 'Familiya',
            'avatar' => 'Rasm',
            'email' => 'Pochta',
            'password' => 'Parol',
            'created' => 'Yaratildi',
            'status' => 'Status',
            'role' => 'Roli',
            'company_id' => 'O\'quv markazi',
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public static function count()
    {
        return self::find()->count();
    }

    public static function getAvatar()
    {
        return Yii::$app->user->identity->avatar;
    }

    public static function getFIO()
    {
        return Yii::$app->user->identity->lastname . ' ' . Yii::$app->user->identity->firstname;
    }
    public function getAuthorname()
    {
        return $this->lastname . ' ' . $this->firstname;
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($email)
    {
        return static::findOne(['email' => $email]);
    }


    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
    }

    public function generateToken()
    {
        return $this->accessToken = Yii::$app->security->generateRandomString();
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        $validateresult = Yii::$app->getSecurity()->validatePassword($password, $this->password);
        return $validateresult;
    }


}

