<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner}}`.
 */
class m220114_042624_create_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'created_at' =>$this->string(),
            'updated_at' =>$this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
        $this->createTable('{{%banner_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(),
            'subtitle' => $this->text(),
            'description' => $this->text(),
            'button_label' => $this->string(),
        ]);

        $this->addForeignKey('fk_banner_lang_relation', '{{%banner_lang}}', 'owner_id', '{{%banner}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_banner_lang_relation', '{{%banner_lang}}');
        $this->dropTable('{{%banner_lang}}');
        $this->dropTable('{{%blog_news}}');
    }
}
