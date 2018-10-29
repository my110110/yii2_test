<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/10/24
 * Time: 14:02
 */

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\TestUser;

class UserTestController extends Controller
{
    public  function actionIndex(){
        $user = New TestUser();
        $user->primaryKey = 1;
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
        Yii::$app->queue->delay(1*60)->push(new \app\Jobs\OrderPingJob(
            [
                'id'=>100,
                'userid'=>'你好'
            ]
            )
        );
    }
}