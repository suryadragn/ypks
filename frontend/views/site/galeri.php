<?php

/** @var yii\web\View $this */
/** @var common\models\Gallery[] $galleries */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Galeri Foto & Dokumentasi - Yapendikra';
$this->params['breadcrumbs'][] = 'Galeri';
?>
<div class="site-galeri bg-light-soft min-vh-100 pb-5">
    <!-- Hero Header Gallery -->
    <div class="container-fluid bg-primary py-5 mb-5 text-white text-center shadow-sm" style="background: linear-gradient(135deg, #422006 0%, #d97706 100%);">
        <div class="container py-4 animate-up" style="color: white;">
            <h1 class="display-4 fw-black text-uppercase mb-3 ls-2">Galeri Kehidupan</h1>
            <div class="mx-auto bg-white mb-4 rounded" style="height: 4px; width: 360px; opacity: 0.9;"></div>
            <p class="lead opacity-75">Dokumentasi momen berharga, fasilitas, dan kegiatan seluruh unit pendidikan YPKS.</p>
        </div>
    </div>
    <div class="container">
        <?php if (!empty($galleries)): ?>
            <div class="row" id="gallery-grid">
                <?php foreach ($galleries as $index => $gallery): ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <?php
                        $imgUrl = null;
                        $alt = "";
                        if ($gallery->image) {
                            if (strpos($gallery->image, 'http') === 0) {
                                $imgUrl = str_replace('.co', '.co.com', $gallery->image);
                            } elseif (file_exists(Yii::getAlias('@public/uploads/gallery/') . $gallery->image)) {
                                $imgUrl = Url::to('@web/uploads/gallery/' . $gallery->image);
                            }
                            $path = parse_url($imgUrl, PHP_URL_PATH); // Ambil /xKLLGN9X/f3ef944f8ecc.jpg
                            $alt = pathinfo($path, PATHINFO_FILENAME);
                        }
                        
                        if (!$imgUrl) {
                            $imgUrl = 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop';
                        }
                        ?>
                        <div class="gallery-card-premium rounded-4 shadow-sm overflow-hidden bg-white position-relative clickable-gallery h-100 d-flex flex-column"
                            data-img="<?= $imgUrl ?>"
                            data-title="<?= Html::encode($gallery->title) ?>"
                            style="cursor: pointer;">
                            <div class="img-wrapper overflow-hidden" style="height: 280px;">
                                <img src="<?= $imgUrl ?>" alt="<?= $alt ?>" class="gallery-image w-100 h-100" style="object-fit: cover;">
                                <div class="gallery-info-overlay d-flex flex-column align-items-center justify-content-center text-center p-3">
                                    <div class="zoom-icon mb-2">
                                        <i class="fas fa-search-plus text-white display-4"></i>
                                    </div>
                                    <h5 class="text-white font-weight-bold mb-1"><?= Html::encode($gallery->title) ?></h5>
                                    <span class="badge badge-light-soft rounded-pill px-3 py-1 font-weight-normal small">KLIK UNTUK MEMPERBESAR</span>
                                </div>
                            </div>
                            <div class="card-caption p-3 bg-white text-center border-top mt-auto">
                                <h6 class="mb-0 text-dark font-weight-bold"><?= Html::encode($gallery->title) ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div class="mb-4 display-3 text-light">📸</div>
                <h3 class="text-dark-50">Galeri Masih Kosong</h3>
                <p class="text-muted">Dokumentasi kegiatan kami akan segera muncul di sini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Lightbox Style Card -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0 rounded-5 shadow-2xl overflow-hidden">
            <div class="modal-body p-0">
                <div class="position-absolute" style="top: 15px; right: 15px; z-index: 10;">
                    <button type="button" class="btn btn-white btn-circle shadow-sm" data-dismiss="modal" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: none;">
                        <i class="fas fa-times text-dark"></i>
                    </button>
                </div>
                <div class="p-3 bg-white">
                    <img id="modal-image" src="" class="img-fluid rounded-4 w-100 shadow-sm" style="max-height: 70vh; object-fit: contain; background: #f8fafc;">
                </div>
                <div class="card-footer bg-white border-0 p-4 pt-1 text-center">
                    <h3 id="modal-title" class="fw-bold text-dark mb-1 ls-neg-1"></h3>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <span class="badge bg-primary-soft text-primary px-3 py-1 rounded-pill small fw-bold mt-2">DOKUMENTASI RESMI YPKS</span>
                    </div>
                    <p class="text-muted small mt-3 mb-0 text-uppercase ls-2" style="font-size: 0.7rem;">Yayasan Pendidikan Karanganyar Surakarta</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-light-soft {
        background-color: #f1f5f9;
    }

    .bg-primary-soft {
        background-color: rgba(37, 99, 235, 0.1);
    }

    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .fw-black {
        font-weight: 900;
    }

    .ls-2 {
        letter-spacing: 2px;
    }

    .ls-neg-1 {
        letter-spacing: -1px;
    }

    .rounded-5 {
        border-radius: 24px;
    }

    .rounded-4 {
        border-radius: 16px;
    }

    .btn-circle {
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s;
    }

    .btn-circle:hover {
        transform: rotate(90deg) scale(1.1);
        background: #f1f5f9 !important;
    }

    /* Card Styles */
    .gallery-card-premium {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        border: none;
    }

    .gallery-card-premium:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .img-wrapper {
        position: relative;
    }

    .gallery-image {
        width: 100%;
        height: auto;
        transition: transform 0.6s ease;
    }

    .gallery-card-premium:hover .gallery-image {
        transform: scale(1.1);
    }

    /* Hover Overlay */
    .gallery-info-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(37, 99, 235, 0.7);
        backdrop-filter: blur(5px);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .gallery-card-premium:hover .gallery-info-overlay {
        opacity: 1;
    }

    .badge-light-soft {
        background-color: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    .zoom-icon {
        transform: scale(0.5);
        transition: transform 0.4s ease;
    }

    .gallery-card-premium:hover .zoom-icon {
        transform: scale(1);
    }

    .animate-up {
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php
$js = <<<JS
$('.clickable-gallery').on('click', function() {
    var imgSrc = $(this).data('img');
    var title = $(this).data('title');
    
    $('#modal-image').attr('src', imgSrc);
    $('#modal-title').text(title);
    $('#galleryModal').modal('show');
});

// Pemicu Paksa Tutup Modal (Jika data-dismiss gagal)
$(document).on('click', '[data-dismiss="modal"]', function() {
    $(this).closest('.modal').modal('hide');
});
JS;
$this->registerJs($js);
?>