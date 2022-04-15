<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner_ad}}`.
 */
class m220116_160149_create_banner_ad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner_ad}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'created_at' => $this->string(),
            'updated_at' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banner_ad}}');
    }
}
