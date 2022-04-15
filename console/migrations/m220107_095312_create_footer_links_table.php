<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%footer_links}}`.
 */
class m220107_095312_create_footer_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%footer_links}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'created_at' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%footer_links_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(),
        ]);

        $this->addForeignKey('fk_footer_links_lang_relation','{{%footer_links_lang}}','owner_id','{{%footer_links}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_footer_links_lang_relation','{{%footer_links_lang}}');
        $this->dropTable('{{%footer_links_lang}}');
        $this->dropTable('{{%footer_links}}');
    }
}
