<?php

namespace app\controllers;
use yii\web\Controller;
use app\models\TestUser;

class EsController extends Controller
{
    public function actionIndex()
    {
        $user = New TestUser();
        $user->name = '大家好';
        $user->sex = '1';
        $user->age = '12';
        $user->save();
        echo 123;
       // return $this->render('index');
    }

}
