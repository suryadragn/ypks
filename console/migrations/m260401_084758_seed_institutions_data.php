<?php

use yii\db\Migration;

/**
 * Class m260401_084758_seed_institutions_data
 */
class m260401_084758_seed_institutions_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%institutions}}', ['name', 'description', 'logo', 'created_at', 'updated_at'], [
            [
                'Akademi Peternakan Karanganyar (APEKA)', 
                'Akademi Peternakan Karanganyar (APEKA) menyelenggarakan pendidikan tinggi di bidang peternakan dengan fokus pada kualitas lulusan yang siap kerja.', 
                'logo-apeka.png', 
                time(), 
                time()
            ],
            [
                'SMK Penda 2 Karanganyar', 
                'SMK Penda 2 Karanganyar merupakan lembaga pendidikan menengah kejuruan yang berorientasi pada teknologi dan industri.', 
                'logo-smkpenda2.png', 
                time(), 
                time()
            ],
            [
                'SMK Penda 3 Karanganyar', 
                'SMK Penda 3 Karanganyar fokus pada pengembangan keterampilan siswa di bidang manajemen dan bisnis.', 
                'logo-smkpenda3.png', 
                time(), 
                time()
            ],
            [
                'SMP Penda Mojogedang', 
                'SMP Penda Mojogedang memberikan pendidikan dasar menengah dengan penekanan pada karakter dan akhlak mulia.', 
                'logo-smppendamojo.png', 
                time(), 
                time()
            ],
            [
                'SMP Penda Tawangmangu', 
                'SMP Penda Tawangmangu terletak di kawasan wisata, memberikan lingkungan belajar yang asri dan kondusif.', 
                'logo-smppendatawang.png', 
                time(), 
                time()
            ],
            [
                'TK Penda Karanganyar', 
                'TK Penda Karanganyar adalah awal dari perjalanan pendidikan putra-putri Anda, bermain sambil belajar dengan ceria.', 
                'logo-tkpenda.png', 
                time(), 
                time()
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%institutions}}');
    }
}
