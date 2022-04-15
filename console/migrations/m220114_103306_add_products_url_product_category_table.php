<?php

use yii\db\Migration;

/**
 * Class m220114_103306_add_products_url_product_category_table
 */
class m220114_103306_add_products_url_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_category}}','product_url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product_category}}','product_url');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220114_103306_add_products_url_product_category_table cannot be reverted.\n";

        return false;
    }
    */
}
