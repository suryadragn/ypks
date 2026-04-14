<?php

/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = Yii::$app->name . ' - ' . Yii::$app->params['appFullName'];
?>
<div class="site-index">
    <!-- Hero Section -->
    <div class="hero-section d-flex align-items-center justify-content-center text-white" style="min-height: 85vh; background: linear-gradient(rgba(66, 32, 6, 0.75), rgba(66, 32, 6, 0.85)), url('<?= Url::to('@web/image/ypks_home.jpg') ?>') no-repeat center center; background-size: cover;">
        <div class="container text-center px-4" style="max-width: 900px;">
            <h1 class="display-2 fw-black mb-4 animate-up" style="letter-spacing: -1px;">Membangun Generasi Cerdas & Berakhlak</h1>
            <p class="lead mb-5 px-md-5 fw-light opacity-90" style="font-size: 1.35rem; line-height: 1.6;">Selamat datang di portal resmi <?= Yii::$app->name ?>. Kami berkomitmen menyelenggarakan pendidikan berkualitas dengan landasan nilai-nilai keagamaan yang kuat.</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="<?= Url::to(['/site/about']) ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fs-5 fw-bold transition-all hover-scale">Pelajari Lebih Lanjut</a>
                <a href="<?= Url::to(['/site/contact']) ?>" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fs-5 fw-bold transition-all hover-scale">Hubungi Kami</a>
            </div>
        </div>
    </div>

    <!-- Keunggulan Section -->
    <div class="container my-5 py-5">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 2px;">Mengapa Memilih Kami</h6>
            <h2 class="display-5 fw-black text-dark">Keunggulan YPKS</h2>
            <div class="mx-auto bg-primary mt-3 rounded" style="height: 4px; width: 60px;"></div>
        </div>

        <div class="row g-4 mt-4">
            <!-- Poin 1 -->
            <div class="col-md-4">
                <div class="card h-100 card-premium text-center">
                    <div class="card-body p-5">
                        <div class="mb-4 d-inline-flex bg-primary bg-opacity-10 p-4 rounded-circle">
                            <span style="font-size: 3rem;">🌟</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Lingkungan Terpadu</h4>
                        <p class="card-text text-muted mb-4 small">Menciptakan ekosistem belajar yang kondusif, beretika, dan mengedepankan nilai-nilai budi pekerti yang luhur.</p>
                        <hr class="w-25 mx-auto bg-primary">
                    </div>
                </div>
            </div>
            <!-- Poin 2 -->
            <div class="col-md-4">
                <div class="card h-100 card-premium text-center">
                    <div class="card-body p-5">
                        <div class="mb-4 d-inline-flex bg-success bg-opacity-10 p-4 rounded-circle">
                            <span style="font-size: 3rem;">👩‍🏫</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Pendidik Profesional</h4>
                        <p class="card-text text-muted mb-4 small">Didukung oleh tenaga pendidik dan kependidikan yang kompeten, berdedikasi tinggi, dan sarat pengalaman.</p>
                        <hr class="w-25 mx-auto bg-success">
                    </div>
                </div>
            </div>
            <!-- Poin 3 -->
            <div class="col-md-4">
                <div class="card h-100 card-premium text-center">
                    <div class="card-body p-5">
                        <div class="mb-4 d-inline-flex bg-warning bg-opacity-10 p-4 rounded-circle">
                            <span style="font-size: 3rem;">💡</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Fasilitas Inovatif</h4>
                        <p class="card-text text-muted mb-4 small">Menyediakan sarana dan prasarana terdepan untuk memastikan siswa siap menghadapi tantangan globalisasi.</p>
                        <hr class="w-25 mx-auto bg-warning">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.hero-section {
    width: 100vw;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
    margin-top: -70px; /* Offset for container padding */
}
.fw-black {
    font-weight: 900;
}
.animate-up {
    animation: fadeInUp 1s ease both;
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
