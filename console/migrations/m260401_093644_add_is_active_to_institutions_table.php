<?php

use yii\db\Migration;

/**
 * Class m260401_093644_add_is_active_to_institutions_table
 */
class m260401_093644_add_is_active_to_institutions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%institutions}}', 'is_active', $this->smallInteger()->defaultValue(1)->after('external_link'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%institutions}}', 'is_active');
    }
}
