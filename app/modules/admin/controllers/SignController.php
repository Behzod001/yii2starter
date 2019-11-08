<?php
/**
 * Created by PhpStorm.
 * User: Behzod
 * Date: 16.03.2019
 * Time: 22:00
 */

namespace app\modules\admin\controllers;


use app\models\LoginForm;
use app\models\SignUp;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SignController extends Controller
{
    public $layout = '/sign';

    public function actionIn()
    {
        $model = new LoginForm();
        if ($post = Yii::$app->request->post('LoginForm')) {
            $model->attributes = $post;
            if ($model->login()) {
                return $this->redirect('/admin/default/index');
            } else {
                throw new NotFoundHttpException("Foydalanuvchi topilmadi",404);
            }

        } else return $this->render('in', ['model' => $model]);

    }

    public function actionUp()
    {
        $model = new SignUp();

        if ($post = Yii::$app->request->post('SignUp')) {
            if ($model->signup($post))
                return $this->redirect("/admin/sign/in");
            else return $this->refresh();
        }

        return $this->render('up', [
            'model' => $model
        ]);
    }

    public function actionOut()
    {
        Yii::$app->user->logout();
        return $this->redirect('/admin/sign/in');
    }

    public function actionLock(){
        return $this->render("lock");
    }
}