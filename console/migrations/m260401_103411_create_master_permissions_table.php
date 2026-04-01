<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%master_permissions}}`.
 */
class m260401_103411_create_master_permissions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%master_permissions}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->unique()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        // Masukkan Data Standar
        $this->batchInsert('{{%master_permissions}}', ['code', 'name', 'description'], [
            ['news', 'Kelola Berita', 'Izin untuk menambah, mengedit, dan menghapus postingan berita.'],
            ['gallery', 'Kelola Galeri', 'Izin untuk mengunggah foto dan mengelola album dokumentasi.'],
            ['institution', 'Kelola Lembaga', 'Izin untuk memperbarui profil dan data lembaga pendidikan.'],
            ['page', 'Kelola Halaman Statis', 'Izin untuk mengedit profil yayasan dan halaman statis lainnya.'],
            ['message', 'Kelola Pesan Masuk', 'Izin untuk membaca dan membalas aspirasi dari form kontak.'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%master_permissions}}');
    }
}
