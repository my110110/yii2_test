<?php

use yii\db\Migration;

/**
 * Class m180829_030618_add_type_user_test
 */
class m180829_030618_add_type_user_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
          $this->addColumn('user_test','type',$this->smallInteger()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180829_030618_add_type_user_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180829_030618_add_type_user_test cannot be reverted.\n";

        return false;
    }
    */
}
