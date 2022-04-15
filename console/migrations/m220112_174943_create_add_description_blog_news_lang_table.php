<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_description_blog_news_lang}}`.
 */
class m220112_174943_create_add_description_blog_news_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%blog_news_lang}}', 'description', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%blog_news_lang}}', 'description');
    }
}
