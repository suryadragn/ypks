<?php

/** @var yii\web\View $this */
use yii\helpers\Url;

$this->title = 'Yapendikra - Yayasan Pendidikan Keagamaan';
?>
<div class="site-index">
    <!-- Hero Section -->
    <div class="hero-section d-flex align-items-center justify-content-center text-white" style="min-height: 85vh; background: linear-gradient(rgba(30, 58, 138, 0.75), rgba(30, 58, 138, 0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1920&auto=format&fit=crop') no-repeat center center; background-size: cover;">
        <div class="container text-center px-4" style="max-width: 900px;">
            <h1 class="display-2 fw-bold mb-4 animate-up">Membangun Generasi Cerdas & Berakhlak</h1>
            <p class="lead mb-5 px-md-5 fw-light opacity-90" style="font-size: 1.25rem;">Selamat datang di portal resmi Yapendikra. Kami berkomitmen menyelenggarakan pendidikan berkualitas dengan landasan nilai-nilai keagamaan yang kuat untuk masa depan yang lebih baik.</p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="<?= Url::to(['/site/about']) ?>" class="btn btn-primary btn-lg rounded-pill px-5 py-3 shadow-lg fs-5">Pelajari Lebih Lanjut</a>
                <a href="<?= Url::to(['/site/contact']) ?>" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fs-5">Hubungi Kami</a>
            </div>
        </div>
    </div>

    <!-- Institutions Section -->
    <div class="container my-5 py-5">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 2px;">Jenjang Pendidikan</h6>
            <h2 class="display-5 fw-black text-dark">Lembaga Kami</h2>
            <div class="mx-auto bg-primary mt-3 rounded" style="height: 4px; width: 60px;"></div>
        </div>

        <div class="row g-4 mt-4">
            <!-- SD/MI -->
            <div class="col-md-4">
                <div class="card h-100 card-premium text-center">
                    <div class="card-body p-5">
                        <div class="mb-4 d-inline-flex bg-primary bg-opacity-10 p-4 rounded-circle">
                            <span style="font-size: 3rem;">🎒</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Pendidikan Dasar</h4>
                        <p class="card-text text-muted mb-4 small">Memberikan pondasi kuat bagi perkembangan kognitif, afektif, dan psikomotorik anak di usia dini.</p>
                        <a href="<?= Url::to(['/site/lembaga']) ?>" class="btn btn-link text-decoration-none fw-bold">Detail Lembaga <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- SMP/MTs -->
            <div class="col-md-4">
                <div class="card h-100 card-premium text-center">
                    <div class="card-body p-5">
                        <div class="mb-4 d-inline-flex bg-success bg-opacity-10 p-4 rounded-circle">
                            <span style="font-size: 3rem;">🏫</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Pendidikan Menengah</h4>
                        <p class="card-text text-muted mb-4 small">Mengembangkan potensi siswa secara optimal menuju kedewasaan dan kemandirian berkarakter.</p>
                        <a href="<?= Url::to(['/site/lembaga']) ?>" class="btn btn-link text-decoration-none fw-bold">Detail Lembaga <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- SMA/MA -->
            <div class="col-md-4">
                <div class="card h-100 card-premium text-center">
                    <div class="card-body p-5">
                        <div class="mb-4 d-inline-flex bg-warning bg-opacity-10 p-4 rounded-circle">
                            <span style="font-size: 3rem;">🎓</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">Pendidikan Atas</h4>
                        <p class="card-text text-muted mb-4 small">Mempersiapkan lulusan yang siap bersaing secara global dengan bekal ilmu pengetahuan.</p>
                        <a href="<?= Url::to(['/site/lembaga']) ?>" class="btn btn-link text-decoration-none fw-bold">Detail Lembaga <i class="bi bi-arrow-right"></i></a>
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
