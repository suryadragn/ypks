<?php

/** @var yii\web\View $this */
/** @var int $activeInstitutionCount */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Profil YPKS';
$this->params['breadcrumbs'][] = $this->title;

$foundationYear = 1983;
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
                                <h3 class="h2 fw-bold mb-0">&nbsp;<?= $activeInstitutionCount ?></h3>
                                <span class="small text-muted ml-2">&nbsp;Lembaga aktif</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="bg-success-soft p-3 rounded-circle mr-3">
                                    <i class="fas fa-history text-success"></i>
                                </div>
                                <h3 class="h2 fw-bold mb-0">&nbsp;<?= $yearsOfExperience ?></h3>
                                <span class="small text-muted ml-2">&nbsp;Tahun Berkarya</span>
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
                    <p class="opacity-75">Lima pilar utama pengabdian YPKS untuk kemajuan pendidikan di Indonesia.</p>
                </div>
                <div class="col-lg-8">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 d-flex align-items-center bg-white bg-opacity-10 p-3 rounded-3 shadow-sm border border-white border-opacity-10 hover-lift-misi transition-all">
                            <h4 class="fw-black text-warning m-0 mr-4" style="width: 40px; opacity:0.9;">01</h4>
                            <span class="fs-6 font-weight-bold">Mewujudkan pertumbuhan secara bertahap.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center bg-white bg-opacity-10 p-3 rounded-3 shadow-sm border border-white border-opacity-10 hover-lift-misi transition-all">
                            <h4 class="fw-black text-warning m-0 mr-4" style="width: 40px; opacity:0.9;">02</h4>
                            <span class="fs-6 font-weight-bold">Merekrut dan membina Sumber Daya Manusia profesional dalam lingkungan kerja yang sehat.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center bg-white bg-opacity-10 p-3 rounded-3 shadow-sm border border-white border-opacity-10 hover-lift-misi transition-all">
                            <h4 class="fw-black text-warning m-0 mr-4" style="width: 40px; opacity:0.9;">03</h4>
                            <span class="fs-6 font-weight-bold">Mengembangkan nilai-nilai luhur dalam setiap lembaga/unit pelaksana.</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center bg-white bg-opacity-10 p-3 rounded-3 shadow-sm border border-white border-opacity-10 hover-lift-misi transition-all">
                            <h4 class="fw-black text-warning m-0 mr-4" style="width: 40px; opacity:0.9;">04</h4>
                            <span class="fs-6 font-weight-bold">Menyelenggarakan operasional Sekolah/Perguruan Tinggi sesuai standar Pendidikan Kebudayaan Nasional.</span>
                        </li>
                        <li class="d-flex align-items-center bg-white bg-opacity-10 p-3 rounded-3 shadow-sm border border-white border-opacity-10 hover-lift-misi transition-all">
                            <h4 class="fw-black text-warning m-0 mr-4" style="width: 40px; opacity:0.9;">05</h4>
                            <span class="fs-6 font-weight-bold">Menjadi lembaga inovatif dan produktif.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sejarah Section -->
        <div class="sejarah-row py-5 mt-5">
            <div class="row g-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <h6 class="text-primary text-uppercase ls-2 fw-bold mb-3">Rekam Jejak</h6>
                    <h2 class="display-5 fw-black text-dark mb-4">Sejarah Perjalanan YPKS</h2>
                    <div class="sejarah-content text-secondary fs-5 pe-lg-4" style="line-height: 1.8; text-align: justify;">
                        <p class="mb-4">
                            Berdirinya Yayasan Pendidikan Karanganyar Surakarta merupakan bagian penting dari sejarah pembangunan pendidikan di Kabupaten Karanganyar. Kurang lebih 40 tahun silam, Pemerintah Daerah Kabupaten Karanganyar mendirikan dan menyelenggarakan lembaga pendidikan formal (“swasta”) tingkat SLTP (SMP sederajat) dan SLTA (SMA/SMK sederajat) sebagai upaya melaksanakan amanat Pembukaan UUD 1945 dalam rangka memberantas kebodohan, kemiskinan, dan keterbelakangan.
                        </p>
                        <p class="mb-4">
                            Pada tahun 1979 dan 1981, melalui instruksi Menteri Dalam Negeri, Pemerintah Daerah dilarang menyelenggarakan lembaga pendidikan formal swasta secara langsung. Menanggapi hal tersebut, digelarlah rapat-rapat unsur Pemerintah Daerah, Guru, dan Masyarakat untuk mendirikan sebuah Yayasan guna memayungi sekolah-sekolah yang sudah berdiri.
                        </p>
                        <p class="mb-4">
                            Tepat pada tanggal <strong>10 Desember 1983</strong>, melalui Akte Notaris Nomor 3 Agus Haryanto, S.H., lahirlah yayasan dengan nama asli “Yayasan Pendidikan Daerah Tingkat Dua Kabupaten Karanganyar”.
                        </p>
                    </div>

                    <div class="founders-box mt-5 p-4 bg-light rounded-4 shadow-sm border">
                        <h5 class="fw-bold mb-4 text-dark border-bottom pb-2">Tokoh Pendiri:</h5>
                        <ul class="list-unstyled row g-3 small">
                            <?php
                            $pendiri = [
                                "Doktorandus Hartono, Bupati Kepala Daerah Tingkat II Kabupaten Karanganyar, bertempat tinggal di Karanganyar, Tegalasri – Bejen;",
                                "Indardi, Bachelor of Arts, Sekretaris Wilayah Daerah Tingkat II Kabupaten Karanganyar, bertempat tinggal di Karanganyar, Tegalasri-Bejen;",
                                "Toekoel Yoedoharsono, Kepala kantor Departemen pendidikan dan Kebudayaan Kabupaten Karanganyar, Palur - Ngringo – Jaten;",
                                "Insinyur Antonius Dwidoyo, Ketua Badan Perencana Pembangunan Daerah Kabupaten Karanganyar, bertempat tinggal di Karanganyar, Tegalasri – Bejen;",
                                "Doktorandus Gunawan, Kepala Bagian Kesejahteraan Rakyat Sekretariat Wilayah Daerah Tingkat II Kabupaten Karanganyar, bertempat tinggal dari Karanganyar, Harjosari – Popongan;",
                                "Marius Soedomo, bachelor of Art, guru Sekolah Menengah Atas Negeri Karanganyar, bertempat tinggal di Karanganyar, Badranasri RT 14 Rukun Kampung II",
                                "Wariso, Bachelor of Art, Camat bertempat tinggal di Karanganyar",
                                "Doktorandus Agus Suharjo, Guru Sekolah Menengah Atas Negeri Karanganyar, bertempat tinggal di Karanganyar, Tegalasri – Bejen;",
                                "Soetarmo, Staf Bagian Kesejahteraan Rakyat, Kampung Tegalasri – Bejen",
                                "Joanes Soewardo Sastrosumarto, Bachelor of Art, Guru SMA bertempat tinggal di Karanganyar, Ngijo – Tasikmadu;",
                                "Sadari, karyawan SMEA Negeri Karanganyar bertempat tinggal di Karanganyar",
                                "Rachsananto, Bachelor of Arts, Guru SMA bertempat tinggal di Karanganyar, Dompon Kecamatan Karanganyar;",
                                "Pardiyanto, Bachelor Of Art, Guru Sekolah Tehnologi Pertanian Karanganyar, Bertempat tinggal di Karanaganyar, Popongan, Kecamatan Karanganyar;",
                                "Tjahjono Padmohudojo, Pensiunan Pegawai Pemerintah Daerah Kabupaten Karanganyar, bertempat tinggal di Karanganyar, Tegalasri – Karanganayar;",
                                "Soetarno, Kepala Desa Popongan, bertempat tinggal Karanganyar, Popongan, Kecamatan Karanganyar"
                            ];
                            foreach ($pendiri as $p):
                            ?>
                                <div class="col-md-6">
                                    <li class="d-flex align-items-start text-dark opacity-75">
                                        <i class="fas fa-check-circle text-success mt-1 mr-2 opacity-50"></i>
                                        &nbsp;<span><?= $p ?></span>
                                    </li>
                                </div>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5" data-aos="fade-left">
                    <div class="legal-evolution-card p-4 p-xl-5 bg-gradient-dark text-white rounded-4 shadow-lg sticky-top" style="top: 100px; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                        <h4 class="fw-bold mb-4 ls-1">Transformasi & Badan Hukum</h4>
                        <p class="small opacity-75 mb-5">Seiring perkembangan regulasi, YPKS telah melakukan beberapa kali penyesuaian Anggaran Dasar:</p>

                        <div class="timeline-legal">
                            <?php
                            $legal = [
                                "1994" => "Akte Notaris No. 8: Perubahan Susunan Pengurus & Anggaran Dasar Yayasan.",
                                "1999" => "Akte Notaris No. 1: Perubahan Susunan Pengurus & Anggaran Dasar Yayasan.",
                                "2008" => "Akte Notaris No. 08: Penyesuaian UU No. 16/2001 & Perubahan nama menjadi Yayasan Pendidikan Karanganyar Surakarta.",
                                "2013" => "Akte Notaris No. 283: Perubahan Susunan Organ Yayasan.",
                                "2014" => "Akte Notaris No. 05: Perubahan Susunan Organ Yayasan sesuai regulasi terbaru."
                            ];
                            foreach ($legal as $year => $desc):
                            ?>
                                <div class="timeline-item mb-4 border-left pl-3 ml-2 position-relative">
                                    <div class="dot position-absolute bg-warning rounded-circle" style="width:12px; height:12px; left:-7px; top:5px;"></div>
                                    <h6 class="fw-black text-warning mb-1 ls-1">&nbsp;&nbsp;<?= $year ?></h6>
                                    <p class="small mb-0 opacity-80"><?= $desc ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-5 pt-4 border-top border-secondary text-center">
                            <i class="fas fa-certificate text-warning mb-3 display-6 opacity-50"></i>
                            <p class="small font-italic opacity-50 mb-0">Legalitas Terjamin & Akuntabel</p>
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
        background-clip: text;
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

    /* Sejarah & Timeline Styles */
    .bg-gradient-dark {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    }

    .timeline-item {
        border-left: 2px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .timeline-item:hover {
        border-left: 2px solid #ffc107;
        padding-left: 1.5rem !important;
    }

    .hover-lift-misi:hover {
        transform: translateY(-5px);
        background-color: rgba(255, 255, 255, 0.15) !important;
    }

    .founders-box li {
        transition: all 0.2s ease;
        padding: 5px 0;
    }

    .founders-box li:hover {
        transform: translateX(5px);
        color: #007bff !important;
        opacity: 1 !important;
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