<?php

use yii\db\Migration;

/**
 * Class m181024_013712_create_table_test_user
 */
class m181024_013712_create_table_test_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test_user',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(11)->defaultValue(''),
            'sex'=>$this->smallInteger(),
            'age'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181024_013712_create_table_test_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181024_013712_create_table_test_user cannot be reverted.\n";

        return false;
    }
    */
}
