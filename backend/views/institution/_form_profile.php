<?php
?>
<div class="p-3 border border-top-0 rounded-bottom bg-white">
    <div class="alert alert-info py-2 small mb-3">
        <i class="fas fa-info-circle mr-1"></i> Bagian ini digunakan untuk mengisi konten lengkap yang akan tampil saat tombol "Kunjungi Profil" diklik.
    </div>
    
    <?= $form->field($profile, 'vision')->textarea(['rows' => 3, 'placeholder' => 'Visi Lembaga...']) ?>
    <?= $form->field($profile, 'mission')->textarea(['rows' => 5, 'placeholder' => 'Misi Lembaga...']) ?>
    <?= $form->field($profile, 'history')->textarea(['rows' => 6, 'placeholder' => 'Sejarah Singkat Lembaga...']) ?>
    <?= $form->field($profile, 'content')->textarea(['rows' => 10, 'placeholder' => 'Konten Utama Profil...']) ?>
</div>
