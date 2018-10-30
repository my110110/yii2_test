<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "test_user".
 *
 * @property int $id
 * @property string $name
 * @property int $sex
 * @property int $age
 */
class TestUser extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'name', 'sex', 'age'];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'age'], 'integer'],
            [['name'], 'string', 'max' => 11],
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
            'sex' => 'Sex',
            'age' => 'Age',
        ];
    }
}
