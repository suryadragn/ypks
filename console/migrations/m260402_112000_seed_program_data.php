<?php

use yii\db\Migration;

/**
 * Handles seeding data to 'social_program' table.
 */
class m260402_112000_seed_program_data extends Migration
{
    public function safeUp()
    {
        $type = (new \yii\db\Query())
            ->from('{{%social_program_type}}')
            ->where(['name' => 'Dana Bantuan Sosial'])
            ->one();

        if ($type) {
            $this->insert('{{%social_program}}', [
                'type_id' => $type['id'],
                'title' => 'Bantuan Kemanusiaan: Recovery Pasca Bencana',
                'slug' => 'bantuan-kemanusiaan-recovery-pasca-bencana',
                'summary' => 'Program bantuan untuk pemulihan sarana ibadah dan pendidikan pasca bencana alam.',
                'content' => 'Yayasan Pendidikan Karanganyar Surakarta berkomitmen membantu sesama. Melalui program ini, kami mengajak seluruh dermawan untuk ikut serta dalam pembangunan kembali fasilitas pendidikan yang terdampak bencana. Dana yang terkumpul akan digunakan untuk renovasi ruang kelas dan pengadaan alat tulis santri.',
                'image' => null, // Will use default placeholder in view
                'target_amount' => 50000000.00,
                'current_amount' => 12500000.00,
                'status' => 1,
                'is_featured' => 1,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }

    public function safeDown()
    {
        $this->delete('{{%social_program}}', ['slug' => 'bantuan-kemanusiaan-recovery-pasca-bencana']);
    }
}
