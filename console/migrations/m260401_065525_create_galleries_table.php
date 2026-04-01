<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%galleries}}`.
 */
class m260401_065525_create_galleries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%galleries}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%galleries}}');
    }
}
