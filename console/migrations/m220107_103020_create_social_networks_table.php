<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social_networks}}`.
 */
class m220107_103020_create_social_networks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social_networks}}', [
            'id' => $this->primaryKey(),
            'network_url' =>$this->string(),
            'network_icon' =>$this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social_networks}}');
    }
}
