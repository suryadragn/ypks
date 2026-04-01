<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_permissions}}`.
 */
class m260401_103531_create_user_permissions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_permissions}}', [
            'user_id' => $this->integer()->notNull(),
            'permission_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('pk-user_permissions', '{{%user_permissions}}', ['user_id', 'permission_id']);

        // Tambah Foreign Keys agar relasi aman
        $this->addForeignKey(
            'fk-user_permissions-user_id',
            '{{%user_permissions}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user_permissions-permission_id',
            '{{%user_permissions}}',
            'permission_id',
            '{{%master_permissions}}',
            'id',
            'CASCADE'
        );

        // Hapus kolom JSON lama di tabel user karena sudah ganti ke tabel aggregate
        $this->dropColumn('{{%user}}', 'permissions');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%user}}', 'permissions', $this->text()->after('email'));
        $this->dropTable('{{%user_permissions}}');
    }
}
