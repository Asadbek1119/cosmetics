<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%email_data}}`.
 */
class m220107_131921_create_email_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%email_data}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'message' => $this->text(),
            'created_at' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%email_data}}');
    }
}
