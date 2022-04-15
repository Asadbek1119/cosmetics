<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_info}}`.
 */
class m220126_100746_create_order_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_info}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'address' => $this->string(),
            'city' => $this->string(),
            'country' => $this->string(),
            'postcode' => $this->integer(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'created_at' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_info}}');
    }
}
