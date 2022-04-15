<?php

use yii\db\Migration;

/**
 * Class m220116_151101_add_discount_product_table
 */
class m220116_151101_add_discount_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}','discount_status',$this->boolean()->defaultValue(false));
        $this->addColumn('{{%product}}','discount_value',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}','discount_status');
        $this->dropColumn('{{%product}}','discount_value');
    }
}
