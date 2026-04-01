<?php

use yii\db\Migration;

/**
 * Class m260401_090059_fix_institution_logos_filenames
 */
class m260401_090059_fix_institution_logos_filenames extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('{{%institutions}}', ['logo' => 'logo-smk-penda-2-kra.png'], ['like', 'name', 'Penda 2']);
        $this->update('{{%institutions}}', ['logo' => 'logo-smk-penda-3-jatipuro.png'], ['like', 'name', 'Penda 3']);
        $this->update('{{%institutions}}', ['logo' => 'logo-smp-penda-mojogedang.png'], ['like', 'name', 'Mojogedang']);
        $this->update('{{%institutions}}', ['logo' => 'logo-smp-penda-tawangmangu.jpg'], ['like', 'name', 'Tawangmangu']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
