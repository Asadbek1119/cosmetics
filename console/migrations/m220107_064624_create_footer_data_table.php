<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%footer_data}}`.
 */
class m220107_064624_create_footer_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%footer_data}}', [
            'id' => $this->primaryKey(),
            'status' =>$this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%footer_data_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'address' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
        ]);

        $this->addForeignKey('fk_footer_data_lang_relation','{{%footer_data_lang}}','owner_id','{{%footer_data}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_footer_data_lang_relation','{{%footer_data_lang}}');
        $this->dropTable('{{%footer_data_lang}}');
        $this->dropTable('{{%footer_data}}');
    }
}
