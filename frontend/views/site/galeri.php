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
    <div class="container-fluid bg-primary py-5 mb-5 text-white text-center shadow-sm" style="background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);">
        <div class="container py-4 animate-up">
            <h1 class="display-4 fw-black text-uppercase mb-3 ls-2">Galeri Kehidupan</h1>
            <p class="lead opacity-75">Dokumentasi momen berharga, fasilitas, dan kegiatan seluruh unit pendidikan YPKS.</p>
        </div>
    </div>

    <div class="container">
        <?php if (!empty($galleries)): ?>
            <div class="gallery-masonry" id="gallery-grid">
                <?php foreach ($galleries as $index => $gallery): ?>
                    <div class="gallery-masonry-item mb-4" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <div class="gallery-card-premium rounded-4 shadow-sm overflow-hidden bg-white position-relative">
                            <?php 
                                $imgUrl = null;
                                if ($gallery->image && file_exists(Yii::getAlias('@public/uploads/gallery/') . $gallery->image)) {
                                    $imgUrl = Url::to('@web/uploads/gallery/' . $gallery->image);
                                } else {
                                    $imgUrl = 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop';
                                }
                            ?>
                            <div class="img-wrapper overflow-hidden">
                                <img src="<?= $imgUrl ?>" alt="<?= Html::encode($gallery->title) ?>" class="img-fluid gallery-image">
                                <div class="gallery-info-overlay d-flex flex-column align-items-center justify-content-center text-center p-3">
                                    <div class="zoom-icon mb-2">
                                        <i class="fas fa-search-plus text-white display-4"></i>
                                    </div>
                                    <h5 class="text-white font-weight-bold mb-1"><?= Html::encode($gallery->title) ?></h5>
                                    <span class="badge badge-light-soft rounded-pill px-3 py-1 font-weight-normal small">YAPENDIKRA</span>
                                </div>
                            </div>
                            <div class="card-caption p-3 bg-white text-center border-top">
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

<style>
    .bg-light-soft { background-color: #f1f5f9; }
    .fw-black { font-weight: 900; }
    .ls-2 { letter-spacing: 2px; }
    .rounded-4 { border-radius: 12px; }
    
    /* Masonry Grid */
    .gallery-masonry {
        column-count: 3;
        column-gap: 30px;
    }
    
    @media (max-width: 991.98px) {
        .gallery-masonry { column-count: 2; }
    }
    @media (max-width: 767.98px) {
        .gallery-masonry { column-count: 1; }
    }
    
    .gallery-masonry-item {
        display: inline-block;
        width: 100%;
    }
    
    /* Card Styles */
    .gallery-card-premium { transition: transform 0.4s ease, box-shadow 0.4s ease; border: none; }
    .gallery-card-premium:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.15) !important; }
    
    .img-wrapper { position: relative; }
    .gallery-image { width: 100%; height: auto; transition: transform 0.6s ease; }
    .gallery-card-premium:hover .gallery-image { transform: scale(1.1); }
    
    /* Hover Overlay */
    .gallery-info-overlay {
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(37, 99, 235, 0.7); backdrop-filter: blur(5px);
        opacity: 0; transition: opacity 0.4s ease;
    }
    .gallery-card-premium:hover .gallery-info-overlay { opacity: 1; }
    
    .badge-light-soft { background-color: rgba(255, 255, 255, 0.2); border: 1px solid rgba(255, 255, 255, 0.3); color: white; }
    .zoom-icon { transform: scale(0.5); transition: transform 0.4s ease; }
    .gallery-card-premium:hover .zoom-icon { transform: scale(1); }
    
    .animate-up { animation: fadeInUp 0.8s ease-out; }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
