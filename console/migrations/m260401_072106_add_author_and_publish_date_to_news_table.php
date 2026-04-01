<?php

use yii\db\Migration;

class m260401_072106_add_author_and_publish_date_to_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%news}}', 'author', $this->string()->after('image'));
        $this->addColumn('{{%news}}', 'publish_date', $this->date()->after('author'));
        $this->addColumn('{{%news}}', 'category', $this->string()->after('publish_date'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%news}}', 'category');
        $this->dropColumn('{{%news}}', 'publish_date');
        $this->dropColumn('{{%news}}', 'author');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260401_072106_add_author_and_publish_date_to_news_table cannot be reverted.\n";

        return false;
    }
    */
}
