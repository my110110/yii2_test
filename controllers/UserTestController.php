<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/10/24
 * Time: 14:02
 */

namespace app\controllers;

use app\models\UserTest;
use yii;
use yii\web\Controller;
use app\models\TestUser;

class UserTestController extends Controller
{
    public  function actionIndex(){
        $user = New UserTest();
        $user->name = '大家好';
        $user->sex = '1';
        $user->age = '12';
        $user->save();
        echo  123;
    }

    public function actionShow(){
         $user = TestUser::find()->all();
         var_dump($user);
    }

    public function actionDo(){
        $id = yii::$app->request->get('id');
        $name =Yii::$app->request->get('name');
        Yii::$app->queue->delay(1*60)->push(new \app\Jobs\OrderPingJob(
            [
                'id'=>$id,
                'userid'=>$name
            ]
            )
        );
    }
}