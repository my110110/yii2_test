<?php

use yii\db\Migration;

/**
 * Class m180829_030318_init_user_test
 */
class m180829_030318_init_user_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_test', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180829_030318_init_user_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180829_030318_init_user_test cannot be reverted.\n";

        return false;
    }
    */
}
