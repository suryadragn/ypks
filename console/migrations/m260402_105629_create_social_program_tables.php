<?php

use yii\db\Migration;

/**
 * Handles the creation of table `social_program_type` and `social_program`.
 */
class m260402_105629_create_social_program_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/7663961/how-to-modify-existing-table-to-utf8-in-mysql
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // Create Program Type Table
        $this->createTable('{{%social_program_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->text(),
            'icon' => $this->string(100), // e.g. 'fas fa-hand-holding-heart'
        ], $tableOptions);

        // Create Social Program Table
        $this->createTable('{{%social_program}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull()->unique(),
            'summary' => $this->string(500),
            'content' => $this->text(),
            'image' => $this->string(255),
            'target_amount' => $this->decimal(15, 2)->defaultValue(0),
            'current_amount' => $this->decimal(15, 2)->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(1), // 1: Active, 0: Completed/Closed
            'is_featured' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-social_program-type_id',
            '{{%social_program}}',
            'type_id'
        );

        $this->addForeignKey(
            'fk-social_program-type_id',
            '{{%social_program}}',
            'type_id',
            '{{%social_program_type}}',
            'id',
            'CASCADE'
        );

        // Seed initial types
        $this->insert('{{%social_program_type}}', [
            'name' => 'Dana Bantuan Sosial',
            'description' => 'Program penggalangan dana untuk bantuan sosial dan kemanusiaan.',
            'icon' => 'fas fa-hands-helping'
        ]);
        $this->insert('{{%social_program_type}}', [
            'name' => 'Beasiswa Pendidikan',
            'description' => 'Program sosialisasi dan penyaluran beasiswa bagi santri/siswa berprestasi atau kurang mampu.',
            'icon' => 'fas fa-graduation-cap'
        ]);
        $this->insert('{{%social_program_type}}', [
            'name' => 'Pembangunan & Sarpras',
            'description' => 'Pembangunan gedung, asrama, masjid, dan sarana prasarana lainnya.',
            'icon' => 'fas fa-building'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-social_program-type_id', '{{%social_program}}');
        $this->dropTable('{{%social_program}}');
        $this->dropTable('{{%social_program_type}}');
    }
}
