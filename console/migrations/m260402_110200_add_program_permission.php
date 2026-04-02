<?php

use yii\db\Migration;

/**
 * Handles adding 'program' permission to 'master_permissions' table.
 */
class m260402_110200_add_program_permission extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%master_permissions}}', [
            'name' => 'Manajemen Program Sosial',
            'code' => 'program',
            'description' => 'Akses untuk mengelola jenis program dan daftar program sosial.'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%master_permissions}}', ['code' => 'program']);
    }
}
