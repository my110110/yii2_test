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

    }

    public function actionTest(){
//        $model = new UserTest();
//        $model->name = 'adte';
//        $model->type =1;
//        $model->save();
        UserTest::updateAll(['name'=>'adte'],['type'=>1]);
    }



    public function actionRedisTest(){
        Yii::$app->redis->lpush('test',1);
        $num = Yii::$app->redis->llen('test');

        var_dump($num);


    }
    public function actionRedisAdd(){
       Yii::$app->redis->rpop('test');
      // var_dump($a);
        $num = Yii::$app->redis->llen('test');
         var_dump($num);
    }
    public function actionRedisDel(){
        Yii::$app->redis->lrem('test',3,1);
        $num = Yii::$app->redis->llen('test');
        var_dump($num);
    }
}