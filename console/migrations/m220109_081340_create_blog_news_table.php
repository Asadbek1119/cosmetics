<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog_news}}`.
 */
class m220109_081340_create_blog_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_news}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'views' => $this->integer(),
            'date' => $this->string(),
            'created_at' =>$this->string(),
            'updated_at' =>$this->string(),
            'status' => $this->boolean()->defaultValue(false),
            'blog_category_id' => $this->integer(),
        ]);
        $this->createTable('{{%blog_news_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'theme' => $this->string(),
            'content' => $this->text(),
            'button_label' => $this->string(),
        ]);

        $this->addForeignKey('fk_blog_news_lang_relation', '{{%blog_news_lang}}', 'owner_id', '{{%blog_news}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_blog_news_blog_category_id_relation', '{{%blog_news}}', 'blog_category_id', '{{%blog_category}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_blog_category_id_relation', '{{%blog_news}}');
        $this->dropColumn('{{%blog_news}}','blog_category_id');
        $this->dropForeignKey('fk_blog_news_lang_relation', '{{%blog_news_lang}}');
        $this->dropTable('{{%blog_news_lang}}');
        $this->dropTable('{{%blog_news}}');
    }
}
