<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/10/29
 * Time: 10:42
 */
namespace app\Jobs;
use Yii;
use yii\base\BaseObject;
use app\models\UserTest;

class OrderPingJob extends BaseObject implements \yii\queue\JobInterface
{
    public $id;
    public $userid;
    public function execute($queue)
    {
        $id = $this->id;
        $user = $this->userid;
        $model = new UserTest();
        $model->name = $user;
        $model->sex = '1';
        $model->age = $id;
        $model->save();

    }

}