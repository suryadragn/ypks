<?php

use yii\db\Migration;

/**
 * Class m260401_094525_final_create_contact_messages_table
 */
class m260401_094525_final_create_contact_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_messages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'subject' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'is_read' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_messages}}');
    }
}
