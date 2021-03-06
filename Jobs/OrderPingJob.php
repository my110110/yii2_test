<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/10/29
 * Time: 10:42
 */
namespace app\Jobs;
use app\models\TestUser;
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
        Yii::$app->db->transaction(function () use ($id,$user)
        {
        if(UserTest::find()->andFilterWhere(['name'=>$user])->exists()){
            $data = new TestUser();
            $data->name = $user;
            $data->age = $id;
            $data->sex = 20;
            $data->save();
        }else{
            $model = new UserTest();
            $model->name = $user;
            $model->type = $id;
            $model->save();
            if($model->save()){
                return '成功';
            }else{
                return $model->getErrors();
            }

        }
        });
    }


=======
<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/10/29
 * Time: 10:42
 */
namespace app\Jobs;
use app\models\TestUser;
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
        Yii::$app->db->transaction(function () use ($id,$user)
        {
        if(UserTest::find()->andFilterWhere(['name'=>$user])->exists()){
            $data = new TestUser();
            $data->name = $user;
            $data->age = $id;
            $data->sex = 20;
            $data->save();
        }else{
            $model = new UserTest();
            $model->name = $user;
            $model->type = $id;
            $model->save();
            if($model->save()){
                return '成功';
            }else{
                return $model->getErrors();
            }

        }
        });
    }


>>>>>>> e503f3401c49700a0f302ac0e41fce60dad893eb
}