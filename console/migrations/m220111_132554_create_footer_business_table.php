<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%footer_business}}`.
 */
class m220111_132554_create_footer_business_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%footer_business}}', [
            'id' => $this->primaryKey(),
            'status' =>$this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%footer_business_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'week_days' => $this->string(),
            'work_hours' => $this->string(),
        ]);

        $this->addForeignKey('fk_footer_business_lang_relation','{{%footer_business_lang}}','owner_id','{{%footer_business}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_footer_business_lang_relation','{{%footer_business_lang}}');
        $this->dropTable('{{%footer_business_lang}}');
        $this->dropTable('{{%footer_business}}');
    }
}
