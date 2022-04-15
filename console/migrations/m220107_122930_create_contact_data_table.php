<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_data}}`.
 */
class m220107_122930_create_contact_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_data}}', [
            'id' => $this->primaryKey(),
            'icon' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%contact_data_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(),
            'subtitle' => $this->string(),
        ]);

        $this->addForeignKey('fk_contact_data_lang_relation', '{{%contact_data_lang}}', 'owner_id', '{{%contact_data}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_contact_data_lang_relation', '{{%contact_data_lang}}');
        $this->dropTable('{{%contact_data_lang}}');
        $this->dropTable('{{%contact_data}}');
    }
}
