<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_test".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 */
class UserTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
        $model = new TestUser();
        $model->age=1;
        $model->sex =1;
        $model->name = 'abtest';
        $model->save();
    }
}
