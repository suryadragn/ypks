<?php

/** @var yii\web\View $this */
/** @var int $activeInstitutionCount */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Profil YPKS';
$this->params['breadcrumbs'][] = $this->title;

$foundationYear = 1985;
$yearsOfExperience = date('Y') - $foundationYear;
?>
<div class="site-about pt-5 pb-5 bg-white">
    <!-- Hero Section -->
    <div class="container mb-5 overflow-hidden rounded-4 shadow-lg position-relative" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('<?= Url::to('@web/image/ypks_hero.jpg') ?>'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center; justify-content: center; color: white;">
        <div class="text-center p-5 animate-up" data-aos="zoom-in">
            <h6 class="text-uppercase ls-2 mb-3 text-warning font-weight-bold">Yayasan Pendidikan Karanganyar Surakarta</h6>
            <h1 class="display-3 fw-black mb-3">Membangun Bangsa Lewat Pendidikan</h1>
            <div class="badge bg-white text-primary px-4 py-2 rounded-pill font-weight-bold">
                <i class="fas fa-calendar-alt mr-2"></i> Berdiri Sejak <?= $foundationYear ?>
            </div>
        </div>
    </div>

    <!-- Core Vision Mission -->
    <div class="container py-5">
        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="pr-lg-4">
                    <h2 class="display-4 fw-bold text-dark mb-4 card-title-gradient">Tentang Kami</h2>
                    <p class="lead text-muted mb-4" style="line-height: 1.8;">
                        Yayasan Pendidikan Karanganyar Surakarta (YPKS) adalah lembaga yang berdedikasi tinggi dalam mencerdaskan kehidupan bangsa melalui pengelolaan berbagai unit pendidikan yang terakreditasi dan profesional.
                    </p>
                    <div class="row g-4 mb-5">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary-soft p-3 rounded-circle mr-3">
                                    <i class="fas fa-university text-primary"></i>
                                </div>
                                <h3 class="h2 fw-bold mb-0"><?= $activeInstitutionCount ?></h3>
                                <span class="small text-muted ml-2">Lembaga aktif</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-success-soft p-3 rounded-circle mr-3">
                                    <i class="fas fa-history text-success"></i>
                                </div>
                                <h3 class="h2 fw-bold mb-0"><?= $yearsOfExperience ?></h3>
                                <span class="small text-muted ml-2">Thn Berkarya</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="position-relative">
                    <div class="p-5 bg-light rounded-4 shadow-sm border-left-gradient overflow-hidden position-relative pt-5 mt-3">
                        <div class="badge-icon bg-white shadow-sm p-3 rounded-circle position-absolute" style="top:-25px; right:30px; z-index: 1;">
                            <i class="fas fa-quote-right text-primary opacity-25" style="font-size: 1.5rem;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Visi YPKS</h4>
                        <p class="fs-5 italic text-dark-50 mb-0 font-italic">
                            "Menjadi badan hukum penyelenggara pendidikan dan sosial yang terpercaya, unggul dan lestari."
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Misi Section -->
        <div class="misi-row py-5 bg-gradient-blue text-white rounded-4 p-5 shadow" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0 border-right-light">
                    <h2 class="fw-bold mb-3">Misi Strategis</h2>
                    <p class="opacity-75">Tiga pilar utama pengabdian YPKS untuk kemajuan pendidikan di Indonesia.</p>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="misi-item text-center">
                                <div class="icon-number mb-3">01</div>
                                <h6 class="fw-bold text-uppercase small ls-1">Tata Kelola</h6>
                                <p class="small opacity-75">Manajemen organisasi yang sehat dan akuntabel.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="misi-item text-center border-left-light-md">
                                <div class="icon-number mb-3">02</div>
                                <h6 class="fw-bold text-uppercase small ls-1">Profesionalisme</h6>
                                <p class="small opacity-75">Lembaga pendidikan yang profesional dan berkelanjutan.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="misi-item text-center border-left-light-md">
                                <div class="icon-number mb-3">03</div>
                                <h6 class="fw-bold text-uppercase small ls-1">Kemandirian</h6>
                                <p class="small opacity-75">Pemberdayaan unit usaha produktif yayasan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Dasar */
    .fw-black {
        font-weight: 900;
    }

    .ls-2 {
        letter-spacing: 2.5px;
    }

    .ls-1 {
        letter-spacing: 1.2px;
    }

    .rounded-4 {
        border-radius: 20px;
    }

    /* Grapics */
    .bg-primary-soft {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .bg-success-soft {
        background-color: rgba(40, 167, 69, 0.1);
    }

    .bg-gradient-blue {
        background: linear-gradient(135deg, #0f172a 0%, #2563eb 100%);
    }

    .border-left-gradient {
        border-left: 8px solid #007bff;
    }

    .card-title-gradient {
        background: linear-gradient(to right, #000, #444);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Borders */
    @media (min-width: 992px) {
        .border-right-light {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }

        .border-left-light-md {
            border-left: 1px solid rgba(255, 255, 255, 0.2);
        }
    }

    /* Icons Numbers */
    .icon-number {
        font-size: 2.5rem;
        font-weight: 900;
        opacity: 0.3;
        color: #fff;
        line-height: 1;
    }

    .animate-up {
        animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>