<?php

/** @var yii\web\View $this */
/** @var int $institutionCount */
/** @var int $galleryCount */
/** @var int $newsCount */

$this->title = 'Admin Dashboard - YPKS';
$this->params['breadcrumbs'] = [['label' => 'Dashboard']];
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
                <div class="card-header">
                    <h3 class="card-title font-weight-bold text-uppercase">
                        <i class="fas fa-bullseye mr-2"></i> Visi & Misi Yayasan (YPKS)
                    </h3>
                </div>
                <div class="card-body p-4">
                    <div class="vision-section mb-4">
                        <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-2">Visi Utama</h6>
                        <p class="text-dark-50 border-left pl-3" style="font-size: 1.1rem; line-height: 1.7;">
                            Menjadi yayasan pendidikan yang unggul, berkarakter, dan berdaya saing global dalam mencetak sumber daya manusia yang berkualitas di wilayah Karanganyar dan sekitarnya.
                        </p>
                    </div>
                    <div class="mission-section">
                        <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-2">Misi Utama</h6>
                        <ul class="list-unstyled text-muted pl-1">
                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                                <span>Menyelenggarakan pendidikan formal yang berkualitas di semua jenjang.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                                <span>Meningkatkan sarana dan prasarana pendidikan yang modern dan ramah lingkungan.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mt-1 mr-2"></i>
                                <span>Memperkuat sinergi antara dunia pendidikan dengan kebutuhan industri.</span>
                            </li>
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
                            <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-3">Kantor Pusat YPKS</h6>
                            <p class="mb-0 text-muted small">
                                <i class="fas fa-map-marker-alt text-danger mr-2"></i> Jl. Lawu No.115 Karanganyar<br>
                                <i class="fas fa-phone text-success mr-2 mt-2"></i> Telp./Fax: (0271) 495212<br>
                                <i class="fas fa-envelope text-info mr-2 mt-2"></i> Kode Pos 57716
                            </p>
                        </li>
                        <li class="list-group-item p-4">
                            <h6 class="text-primary font-weight-bold text-uppercase small ls-1 mb-3">Sekretariat YPKS</h6>
                            <p class="mb-0 text-muted small">
                                <i class="fas fa-map-marker-alt text-danger mr-2"></i> Jl. Lawu, Harjosari, Popongan, Karanganyar<br>
                                <i class="fas fa-phone text-success mr-2 mt-2"></i> Telp./Fax: (0271) 495284<br>
                                <i class="fas fa-envelope text-info mr-2 mt-2"></i> Kode Pos 57715
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
