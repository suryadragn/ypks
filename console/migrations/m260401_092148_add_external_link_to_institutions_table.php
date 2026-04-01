<?php

use yii\db\Migration;

/**
 * Class m260401_092148_add_external_link_to_institutions_table
 */
class m260401_092148_add_external_link_to_institutions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%institutions}}', 'external_link', $this->string(255)->after('logo'));
        
        // Seed the links from user snippet
        $this->update('{{%institutions}}', ['external_link' => 'http://www.yapendikra.or.id/2015/10/galeri-foto-apeka.html'], ['like', 'name', 'APEKA']);
        $this->update('{{%institutions}}', ['external_link' => 'http://www.yapendikra.or.id/2015/10/identitas-smk-penda-2-karanganyar.html'], ['like', 'name', 'Penda 2']);
        $this->update('{{%institutions}}', ['external_link' => 'http://www.yapendikra.or.id/2015/10/galeri-foto-smk-penda-3-jatipuro.html'], ['like', 'name', 'Penda 3']);
        $this->update('{{%institutions}}', ['external_link' => 'http://www.yapendikra.or.id/2015/10/profil-smp-penda-mojogedang.html'], ['like', 'name', 'Mojogedang']);
        $this->update('{{%institutions}}', ['external_link' => 'http://www.yapendikra.or.id/2015/10/profil-smp-penda-tawangmangu_23.html'], ['like', 'name', 'Tawangmangu']);
        $this->update('{{%institutions}}', ['external_link' => 'http://www.yapendikra.or.id/2015/10/profil-tk-penda-bhatanghari.html'], ['like', 'name', 'TK Penda']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%institutions}}', 'external_link');
    }
}
