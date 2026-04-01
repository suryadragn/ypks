<?php
/** @var yii\web\View $this */
/** @var common\models\Institution $model */
/** @var common\models\InstitutionProfile $profile */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lembaga Pendidikan', 'url' => ['site/lembaga']];
$this->params['breadcrumbs'][] = $this->title;

// Deteksi logo dengan fallback
$logoUrl = null;
if ($model->logo) {
    if (file_exists(Yii::getAlias('@public/uploads/institution/') . $model->logo)) {
        $logoUrl = Url::to('@web/uploads/institution/' . $model->logo);
    } elseif (file_exists(Yii::getAlias('@public/image/') . $model->logo)) {
        $logoUrl = Url::to('@web/image/' . $model->logo);
    }
}
?>

<div class="view-lembaga-premium">
    <!-- Hero Header -->
    <div class="hero-section text-white py-5 mb-5 shadow-sm">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center text-lg-start mb-4 mb-lg-0" data-aos="zoom-in">
                    <div class="logo-hero-container d-inline-flex align-items-center justify-content-center bg-white p-3 rounded-4 shadow">
                        <?php if ($logoUrl): ?>
                            <img src="<?= $logoUrl ?>" alt="<?= Html::encode($model->name) ?>" class="img-fluid" style="max-height: 120px; object-fit: contain;">
                        <?php else: ?>
                            <div class="text-primary display-4">🏫</div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-right">
                    <span class="badge bg-warning text-dark mb-2 px-3 py-2 rounded-pill font-weight-bold text-uppercase small">Profil Lembaga</span>
                    <h1 class="display-3 font-weight-bold mb-3"><?= Html::encode($model->name) ?></h1>
                    <p class="lead opacity-90 mb-0"><?= nl2br(Html::encode($model->description)) ?></p>
                </div>
                <div class="col-lg-2 text-center text-lg-end" data-aos="fade-left">
                    <a href="<?= Url::to(['site/lembaga']) ?>" class="btn btn-outline-light rounded-pill px-4 btn-lg">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            <!-- Sidebar Sidebar -->
            <div class="col-lg-4" data-aos="fade-up">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <!-- Visi Misi Card -->
                    <div class="card border-0 shadow-sm rounded-4 mb-4 glass-card overflow-hidden">
                        <div class="card-header bg-gradient-blue text-white py-3 px-4 border-0">
                            <h5 class="mb-0 fw-bold"><i class="fas fa-flag mr-2 text-warning"></i> Visi & Misi</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="vision-box mb-4">
                                <h6 class="text-primary text-uppercase small font-weight-bold ls-1 mb-2">Visi</h6>
                                <div class="vision-text border-left p-2 pl-3">
                                    <?= $profile && $profile->vision ? $profile->vision : 'Visi sedang disiapkan.' ?>
                                </div>
                            </div>
                            <div class="mission-box">
                                <h6 class="text-primary text-uppercase small font-weight-bold ls-1 mb-2">Misi</h6>
                                <div class="mission-text border-left p-2 pl-3">
                                    <?= $profile && $profile->mission ? $profile->mission : 'Misi sedang disiapkan.' ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- History Card -->
                    <div class="card border-0 shadow-sm rounded-4 glass-card overflow-hidden">
                        <div class="card-header bg-dark text-white py-3 px-4 border-0">
                            <h5 class="mb-0 fw-bold"><i class="fas fa-landmark mr-2 text-warning"></i> Sejarah</h5>
                        </div>
                        <div class="card-body p-4 text-muted small" style="line-height: 1.7;">
                            <?= $profile && $profile->history ? nl2br(Html::encode($profile->history)) : 'Data sejarah belum tersedia.' ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="main-content-card card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white position-relative overflow-hidden">
                    <div class="accent-line mb-4"></div>
                    <h2 class="fw-bold text-dark mb-4 display-5">Tentang Lembaga</h2>
                    
                    <div class="profile-content text-muted" style="line-height: 2; font-size: 1.15rem;">
                        <?php if ($profile && $profile->content): ?>
                            <?= nl2br(Html::encode($profile->content)) ?>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <div class="mb-4 display-3 text-light">📄</div>
                                <h4 class="text-dark-50">Konten Profil Belum Tersedia</h4>
                                <p>Tim administrasi kami sedang menyiapkan profil lengkap untuk <strong><?= Html::encode($model->name) ?></strong>.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="row mt-5 pt-4 border-top">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center text-primary">
                                <div class="icon-box bg-primary-soft p-3 rounded-circle mr-3">
                                    <i class="fas fa-share-alt"></i>
                                </div>
                                <div>
                                    <strong class="d-block text-dark">Bagikan Profil</strong>
                                    <span class="small opacity-75">Sebarkan informasi lembaga ini</span>
                                </div>
                            </div>
                        </div>
                        <?php if ($model->external_link): ?>
                        <div class="col-md-6 text-md-end">
                            <a href="<?= Html::encode($model->external_link) ?>" target="_blank" class="btn btn-primary rounded-pill px-5 btn-lg shadow-primary">
                                Website Resmi <i class="fas fa-external-link-alt ml-2"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Dasar & Grid */
    .view-lembaga-premium { background-color: #f0f4f8; min-height: 100vh; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
    
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        border-bottom: 5px solid #2563eb;
    }
    .logo-hero-container { width: 151px; height: 151px; border: 3px solid rgba(255,255,255,0.1); }
    
    /* Cards */
    .rounded-4 { border-radius: 20px !important; }
    .glass-card { background: rgba(255, 255, 255, 0.8) !important; backdrop-filter: blur(10px); }
    .bg-gradient-blue { background: linear-gradient(to right, #1e3a8a, #2563eb); }
    
    /* Typography */
    .ls-1 { letter-spacing: 1px; }
    .display-3 { font-size: 2.8rem; line-height: 1.1; color: #fff; }
    .border-left { border-left: 4px solid #2563eb !important; }
    
    /* Accent Line */
    .accent-line { width: 70px; height: 6px; background: #2563eb; border-radius: 10px; }
    
    /* Details */
    .icon-box { background-color: rgba(37, 99, 235, 0.1); width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; }
    .shadow-primary { box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2); }
    
    @media (max-width: 991.98px) {
        .display-3 { font-size: 2rem; }
        .logo-hero-container { width: 100px; height: 100px; }
    }
</style>
