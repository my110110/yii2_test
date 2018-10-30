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
        $name = $name.rand(1,10000);
        $do = Yii::$app->queue->push(new \app\Jobs\OrderPingJob(
            [
                'id'=>$id,
                'userid'=>$name
            ]
            )
        );
//        $data = Yii::$app->queue->isReserved($do);
//        $map = Yii::$app->queue->isDone($do);
//       var_dump($data);
//       var_dump($map);
    }
}