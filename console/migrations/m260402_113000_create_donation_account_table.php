<?php

use yii\db\Migration;

/**
 * Handles the creation of table `donation_account` and linking it to `social_program`.
 */
class m260402_113000_create_donation_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // 1. Create Donation Account Table (Reference)
        $this->createTable('{{%donation_account}}', [
            'id' => $this->primaryKey(),
            'bank_name' => $this->string(100)->notNull(), // e.g. BSI, BRI, Mandiri
            'account_number' => $this->string(50)->notNull(),
            'account_holder' => $this->string(100)->notNull(),
            'contact_name' => $this->string(100), // Contact Person
            'contact_phone' => $this->string(20), // WhatsApp Number
            'is_active' => $this->boolean()->defaultValue(true),
        ], $tableOptions);

        // 2. Add Relation to Social Program
        $this->addColumn('{{%social_program}}', 'donation_account_id', $this->integer()->after('type_id'));

        // 3. Add Foreign Key
        $this->addForeignKey(
            'fk-social_program-donation_account_id',
            '{{%social_program}}',
            'donation_account_id',
            '{{%donation_account}}',
            'id',
            'SET NULL',
            'CASCADE'
        );

        // 4. Seed Default Account
        $this->insert('{{%donation_account}}', [
            'bank_name' => 'BSI (Bank Syariah Indonesia)',
            'account_number' => '7123456789',
            'account_holder' => 'YAYASAN PENDIDIKAN KARANGANYAR SURAKARTA',
            'contact_name' => 'Admin Yapendikra',
            'contact_phone' => '081234567890',
            'is_active' => true,
        ]);
        
        // Update existing example program to use this account
        $this->update('{{%social_program}}', ['donation_account_id' => 1]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-social_program-donation_account_id', '{{%social_program}}');
        $this->dropColumn('{{%social_program}}', 'donation_account_id');
        $this->dropTable('{{%donation_account}}');
    }
}
