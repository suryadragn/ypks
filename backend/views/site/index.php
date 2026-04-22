<?php

/** @var yii\web\View $this */
/** @var int $institutionCount */
/** @var int $galleryCount */
/** @var int $newsCount */
/** @var common\models\FoundationConfig $foundationConfig */

$this->title = 'Admin Dashboard - YPKS';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard'];
?>
<div class="site-index">

    <div class="row">
        <!-- Info Boxes -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-university"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Lembaga Terdaftar</span>
                    <span class="info-box-number"><?= $institutionCount ?> Unit</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Berita Dipublikasi</span>
                    <span class="info-box-number"><?= $newsCount ?> Artikel</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-warning elevation-1 text-white"><i class="fas fa-images"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Koleksi Galeri</span>
                    <span class="info-box-number"><?= $galleryCount ?> Foto</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Visi & Misi YPKS Card -->
        <div class="col-md-7">
            <div class="card card-primary card-outline shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title font-weight-bold text-uppercase mb-0">
                        <i class="fas fa-bullseye mr-2"></i> Visi & Misi Yayasan (YPKS)
                    </h3>
                    <div class="ml-auto">
                        <a href="<?= \yii\helpers\Url::to(['foundation-config/index']) ?>" class="btn btn-xs btn-outline-primary rounded-pill px-2">
                             <i class="fas fa-edit"></i> Edit Profil
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="vision-section mb-4">
                        <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-2">Visi Utama</h6>
                        <p class="text-dark-50 border-left pl-3 font-italic" style="font-size: 1.1rem; line-height: 1.7;">
                            "<?= $foundationConfig ? \yii\helpers\Html::encode($foundationConfig->vision) : 'Visi belum diset di referensi.' ?>"
                        </p>
                    </div>
                    <div class="mission-section">
                        <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-3">Misi Utama</h6>
                        <ul class="list-unstyled text-muted pl-1">
                            <?php 
                            if ($foundationConfig && $foundationConfig->mission) {
                                $missions = explode("\n", str_replace("\r", "", $foundationConfig->mission));
                                foreach ($missions as $m) {
                                    $m = trim($m);
                                    if (!$m) continue;
                                    ?>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                                        <span><?= \yii\helpers\Html::encode($m) ?></span>
                                    </li>
                                    <?php
                                }
                            } else {
                                echo '<li class="text-muted italic">Misi belum diset di referensi.</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Identitas Yayasan Card -->
        <div class="col-md-5">
            <div class="card card-dark card-outline shadow-sm h-100">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold text-uppercase">
                        <i class="fas fa-id-card mr-2 text-primary"></i> Identitas Yayasan
                    </h3>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-4">
                            <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-3">Kantor YPKS</h6>
                            <p class="mb-0 text-muted small">
                                <i class="fas fa-map-marker-alt text-danger mr-2"></i> <?= $foundationConfig ? \yii\helpers\Html::encode($foundationConfig->address) : '-' ?><br>
                                <i class="fas fa-phone text-success mr-2 mt-2"></i> Telp./Fax: <?= $foundationConfig ? \yii\helpers\Html::encode($foundationConfig->phone) : '-' ?><br>
                                <i class="fas fa-envelope text-info mr-2 mt-2"></i> <?= $foundationConfig ? \yii\helpers\Html::encode($foundationConfig->email) : '-' ?> <br>
                                <i class="fas fa-mail-bulk text-secondary mr-2 mt-2"></i> Kode Pos <?= $foundationConfig ? \yii\helpers\Html::encode($foundationConfig->postal_code) : '-' ?>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center bg-white border-0 py-3">
                    <span class="text-muted small">www.yapendikra.or.id - Official Website YPKS</span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .ls-1 { letter-spacing: 1px; }
    .border-left { border-left: 5px solid #007bff !important; }
    .info-box-number { font-size: 1.5rem; font-weight: 700; }
</style>
