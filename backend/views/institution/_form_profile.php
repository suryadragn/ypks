<?php
?>
<div class="p-3 border border-top-0 rounded-bottom bg-white">
    <div class="alert alert-info py-2 small mb-3">
        <i class="fas fa-info-circle mr-1"></i> Bagian ini digunakan untuk mengisi konten lengkap yang akan tampil saat tombol "Kunjungi Profil" diklik.
    </div>
    
    <?= $form->field($profile, 'vision')->textarea(['rows' => 3, 'placeholder' => 'Visi Lembaga...']) ?>
    <?= $form->field($profile, 'mission')->textarea(['rows' => 5, 'placeholder' => 'Misi Lembaga... (Gunakan Enter untuk baris baru)']) ?>
    <?= $form->field($profile, 'history')->textarea(['rows' => 6, 'placeholder' => 'Sejarah Singkat Lembaga...']) ?>
    <?= $form->field($profile, 'content')->textarea(['rows' => 10, 'placeholder' => 'Konten Utama Profil...']) ?>

    <hr class="my-4">
    <h6 class="font-weight-bold text-dark mb-3"><i class="fas fa-share-alt mr-1"></i> Media Sosial</h6>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($profile, 'facebook')->textInput(['placeholder' => 'https://facebook.com/username', 'class' => 'form-control rounded-pill']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($profile, 'instagram')->textInput(['placeholder' => 'https://instagram.com/username', 'class' => 'form-control rounded-pill']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($profile, 'tiktok')->textInput(['placeholder' => 'https://tiktok.com/@username', 'class' => 'form-control rounded-pill']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($profile, 'youtube')->textInput(['placeholder' => 'https://youtube.com/@channel', 'class' => 'form-control rounded-pill']) ?>
        </div>
    </div>
</div>
