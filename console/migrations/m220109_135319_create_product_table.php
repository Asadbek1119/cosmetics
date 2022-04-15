<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220109_135319_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'img' => $this->string(),
            'price' => $this->double(),
            'old_price' => $this->double(),
            'created_at' =>$this->string(),
            'updated_at' =>$this->string(),
            'status' => $this->boolean()->defaultValue(false),
            'product_category_id' => $this->integer(),
        ]);

        $this->createTable('{{%product_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(),
            'description' => $this->text(),
            'availability' => $this->string(),
            'shipping' => $this->string(),
            'weight' => $this->string(),
            'information' => $this->text(),
        ]);

        $this->addForeignKey('fk_product_lang_relation', '{{%product_lang}}', 'owner_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_product_product_category_id_relation', '{{%product}}', 'product_category_id', '{{%product_category}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_product_category_id_relation', '{{%product}}');
        $this->dropColumn('{{%product}}','product_category_id');
        $this->dropForeignKey('fk_product_lang_relation', '{{%product_lang}}');
        $this->dropTable('{{%product_lang}}');
        $this->dropTable('{{%product}}');
    }
}
