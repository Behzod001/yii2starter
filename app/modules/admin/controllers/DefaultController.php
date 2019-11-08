<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;


class DefaultController extends Controller
{

    public function actionIndex()
    {

            return $this->render("index");
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }


    public function actionHelp()
    {
        return $this->render('help');
    }


    public function actionBlank()
    {
        return $this->render('_blank');
    }

}
