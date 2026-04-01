<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m260401_102925_add_permissions_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'permissions', $this->text()->after('email')->comment('JSON of user permissions'));
        $this->addColumn('{{%user}}', 'is_superadmin', $this->smallInteger()->defaultValue(0)->after('permissions'));
        
        // Buat user pertama (paling tidak admin saat ini) jadi superadmin
        $this->update('{{%user}}', ['is_superadmin' => 1], ['id' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'permissions');
        $this->dropColumn('{{%user}}', 'is_superadmin');
    }
}
