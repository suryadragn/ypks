<?php

use yii\db\Migration;

class m260422_065452_add_social_links_to_institution_profiles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%institution_profiles}}', 'facebook', $this->string());
        $this->addColumn('{{%institution_profiles}}', 'instagram', $this->string());
        $this->addColumn('{{%institution_profiles}}', 'tiktok', $this->string());
        $this->addColumn('{{%institution_profiles}}', 'youtube', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%institution_profiles}}', 'facebook');
        $this->dropColumn('{{%institution_profiles}}', 'instagram');
        $this->dropColumn('{{%institution_profiles}}', 'tiktok');
        $this->dropColumn('{{%institution_profiles}}', 'youtube');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260422_065452_add_social_links_to_institution_profiles_table cannot be reverted.\n";

        return false;
    }
    */
}
