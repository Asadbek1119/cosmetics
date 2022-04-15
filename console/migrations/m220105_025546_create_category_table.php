<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220105_025546_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%product_category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(),
        ]);

        $this->addForeignKey('fk_product_category_lang_relation', '{{%product_category_lang}}', 'owner_id', '{{%product_category}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category_lang_relation', '{{%product_category_lang}}');
        $this->dropTable('{{%product_category_lang}}');
        $this->dropTable('{{%product_category}}');
    }
}
