<?php

use yii\db\Migration;

/**
 * Class m260401_092517_create_institution_profiles_table
 */
class m260401_092517_create_institution_profiles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%institution_profiles}}', [
            'id' => $this->primaryKey(),
            'institution_id' => $this->integer()->notNull()->unique(),
            'content' => $this->text(),
            'vision' => $this->text(),
            'mission' => $this->text(),
            'history' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-institution-profile-institution_id',
            '{{%institution_profiles}}',
            'institution_id',
            '{{%institutions}}',
            'id',
            'CASCADE'
        );
        
        // Initial seed: Create empty profiles for existing institutions
        $institutions = (new \yii\db\Query())->from('{{%institutions}}')->all();
        foreach ($institutions as $inst) {
            $this->insert('{{%institution_profiles}}', [
                'institution_id' => $inst['id'],
                'content' => 'Profil lengkap ' . $inst['name'] . ' sedang disusun.',
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-institution-profile-institution_id', '{{%institution_profiles}}');
        $this->dropTable('{{%institution_profiles}}');
    }
}
