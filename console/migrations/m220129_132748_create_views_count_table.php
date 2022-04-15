<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%views_count}}`.
 */
class m220129_132748_create_views_count_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%views_count}}', [
            'id' => $this->primaryKey(),
            'blog_news_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'created_at' => $this->string()
        ]);

        $this->addForeignKey('{{%fk_views_count-blog_news_id}}','{{%views_count}}','blog_news_id','{{%blog_news}}','id','CASCADE','CASCADE');
        $this->addForeignKey('{{%fk_views_count-user_id}}','{{%views_count}}','user_id','{{%user}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_views_count-blog_news_id_relation', '{{%views_count}}');
        $this->dropColumn('{{%views_count}}','blog_news_id');

        $this->dropForeignKey('fk_views_count-user_id_relation', '{{%views_count}}');
        $this->dropColumn('{{%views_count}}','user_id');

        $this->dropTable('{{%views_count}}');
    }
}
