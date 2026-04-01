<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m260401_065525_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'image' => $this->string(),
            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
