<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignUp extends Model
{
    public $email;
    public $firstname;
    public $password;
    public $confirmTerms=false;
    
    public function rules()
    {
        return [
            // name, email and firstname required
            [['email', 'password','firstname'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['email'],'unique','targetClass'=>'\app\models\User','message'=>'Email band'],
//            ['confirmTerms','required'],
            ['firstname', 'string'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstname'=>'Username',
            'email' => 'Pochta',
            'password' => 'Parol',
            'confirmTerms' => '* Confirm and terms',
            'verifyCode' => 'Verification Code',
        ];
    }

    public function signup($post){
        $user = new \app\models\User();
        $user->firstname = $post['firstname'];
        $user->email = $post['email'];
        $user->setPassword($post['password']);
        $user->generateAuthKey();
        $user->generateToken();
        $user->created = time();
        if($user->save()){
            return true;
        }else {
            var_dump($user->getErrors());exit;
            return false;
        }

    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
