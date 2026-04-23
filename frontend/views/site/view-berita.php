<?php

/** @var yii\web\View $this */
/** @var common\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['site/berita']];
$this->params['breadcrumbs'][] = $this->title;

// Ambil berita terbaru untuk sidebar (sebagai 'Berita Lainnya')
$otherNews = \common\models\News::find()
    ->where(['not', ['id' => $model->id]])
    ->orderBy(['publish_date' => SORT_DESC])
    ->limit(3)
    ->all();
?>

<div class="news-detail-wrapper pb-5">
    <!-- Immersive Header Section -->
    <div class="news-hero-section position-relative overflow-hidden mb-5 d-flex align-items-end" style="height: 70vh; min-height: 500px;">
        <?php 
            $imageUrl = null;
            if ($model->image) {
                if (strpos($model->image, 'http') === 0) {
                    $imageUrl = $model->image;
                } else {
                    $imageUrl = Url::to(Yii::getAlias('@web/uploads/news/') . $model->image, true);
                }
            }
            if (!$imageUrl) {
                $imageUrl = 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?auto=format&fit=crop&w=1600&q=80';
            }
        ?>
        <div class="hero-bg-overlay" style="background: url('<?= Html::encode($imageUrl) ?>') no-repeat center center; background-size: cover;"></div>
        <div class="hero-gradient-overlay"></div>
        
        <div class="container mb-5 pb-4 position-relative z-index-2">
            <div class="row">
                <div class="col-lg-10 col-xl-8" data-aos="fade-up">
                    <span class="badge bg-primary text-uppercase px-3 py-2 rounded-pill mb-3 ls-2 shadow-sm font-weight-bold">
                        <?= Html::encode($model->category ?: 'WARTA ' . Yii::$app->params['appShortName']) ?>
                    </span>
                    <h1 class="display-3 fw-bold text-white mb-4 ls-neg-2 lh-1 text-shadow-lg">
                        <?= Html::encode($model->title) ?>
                    </h1>
                    <div class="hero-meta d-flex flex-wrap align-items-center text-white-50 gap-4">
                        <div class="meta-item-glass">
                            <i class="fas fa-user-circle me-2"></i>
                            By <span class="text-white"><?= Html::encode($model->author ?: 'Redaksi ' . Yii::$app->params['appShortName']) ?></span>
                        </div>
                        <div class="meta-item-glass border-start-glass ps-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <?= Yii::$app->formatter->asDate($model->publish_date ?: $model->created_at, 'long') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container position-relative z-index-3 mt-neg-50">
        <div class="row g-5">
            <!-- Article Body -->
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <div class="article-card shadow-lg bg-white rounded-5 p-4 p-md-5">
                    
                    <!-- Lead Paragraph or Summary could go here -->
                    <div class="article-content text-secondary fs-5 lh-30 mb-5">
                        <?= nl2br($model->content) ?>
                    </div>

                    <!-- Article Share & Tags -->
                    <div class="share-section d-flex flex-wrap align-items-center justify-content-between border-top pt-5 mt-5">
                        <div class="tags mb-3 mb-md-0">
                            <span class="text-muted me-3 fw-bold small text-uppercase ls-1">KATA KUNCI:</span>
                            <a href="#" class="badge bg-light text-muted text-decoration-none px-3 py-2 rounded-pill">#Pendidikan</a>
                            <a href="#" class="badge bg-light text-muted text-decoration-none px-3 py-2 rounded-pill">#Yayasan</a>
                            <a href="#" class="badge bg-light text-muted text-decoration-none px-3 py-2 rounded-pill">#WartaYPKS</a>
                        </div>
                        <div class="social-share d-flex gap-2">
                             <a href="#" class="share-btn fb"><i class="fab fa-facebook-f"></i></a>
                             <a href="#" class="share-btn tw"><i class="fab fa-twitter"></i></a>
                             <a href="#" class="share-btn wa text-success"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <div class="nav-links mt-5 pt-4">
                        <a href="<?= Url::to(['site/berita']) ?>" class="btn btn-primary rounded-pill px-5 shadow-lg btn-lg hover-up">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Semua Berita
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                <div class="sticky-top" style="top: 100px;">
                    
                    <!-- Sidebar Section: Recent News -->
                    <div class="sidebar-box mb-5">
                        <h4 class="fw-bold mb-4 ls-1 position-relative pb-2 border-bottom border-3 border-primary d-inline-block">Berita Lainnya</h4>
                        <div class="related-posts">
                            <?php foreach ($otherNews as $news): ?>
                            <a href="<?= Url::to(['site/view-berita', 'id' => $news->id]) ?>" class="text-decoration-none group">
                                <div class="d-flex align-items-center mb-4 transition-all hover-translate-x">
                                    <div class="flex-shrink-0" style="width: 80px; height: 80px;">
                                        <?php
                                            $sideImg = null;
                                            if ($news->image) {
                                                if (strpos($news->image, 'http') === 0) {
                                                    $sideImg = $news->image;
                                                } else {
                                                    $sideImg = Url::to(Yii::getAlias('@web/uploads/news/') . $news->image);
                                                }
                                            }
                                            if (!$sideImg) {
                                                $sideImg = 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?auto=format&fit=crop&w=150&q=80';
                                            }
                                        ?>
                                        <img src="<?= $sideImg ?>" 
                                             class="img-fluid rounded-3 h-100 w-100 object-fit-cover shadow-sm border" alt="Alt">
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div class="text-muted small mb-1"><?= Yii::$app->formatter->asDate($news->publish_date ?: $news->created_at, 'medium') ?></div>
                                        <h6 class="fw-bold text-dark mb-0 line-clamp-2"><?= Html::encode($news->title) ?></h6>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Sidebar Section: Info Card -->
                    <div class="sidebar-box bg-primary p-4 rounded-5 text-white shadow-lg overflow-hidden position-relative">
                        <h4 class="fw-bold mb-3 position-relative z-index-2">Tentang <?= Yii::$app->params['appShortName'] ?></h4>
                        <p class="small text-white-50 position-relative z-index-2"><?= Yii::$app->params['appFullName'] ?> mendukung transformasi pendidikan dan pembangunan iman melalui berbagai program institusional di Karanganyar dan Surakarta.</p>
                        <a href="<?= Url::to(['site/about']) ?>" class="btn btn-light btn-sm rounded-pill px-4 fw-bold position-relative z-index-2 mt-2">Selengkapnya</a>
                        <i class="fas fa-university position-absolute text-white" style="bottom:-20px; right:-20px; font-size: 150px; opacity: 0.1;"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Typography & Layout */
    .ls-2 { letter-spacing: 2px; }
    .ls-1 { letter-spacing: 1px; }
    .ls-neg-2 { letter-spacing: -2px; }
    .lh-1 { line-height: 1.1; }
    .lh-30 { line-height: 1.8; }
    .z-index-2 { z-index: 2; }
    .z-index-3 { z-index: 3; }
    .text-shadow-lg { text-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .mt-neg-50 { margin-top: -80px; }
    .object-fit-cover { object-fit: cover; }

    /* Hero Section */
    .hero-bg-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        filter: brightness(0.6) contrast(1.1);
        z-index: 0;
    }
    .hero-gradient-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(0deg, rgba(15,23,42,1) 0%, rgba(15,23,42,0) 80%);
        z-index: 1;
    }

    /* Glassmorphism Styles */
    .meta-item-glass {
        padding: 8px 0;
        font-weight: 500;
    }
    .border-start-glass { border-left: 1px solid rgba(255,255,255,0.2); }

    /* Cards & Components */
    .article-card {
        border: none;
    }
    .article-content {
        color: #334155;
        font-family: 'Outfit', sans-serif;
    }
    .hover-up:hover { transform: translateY(-5px); }
    .transition-all { transition: all 0.3s ease; }
    .hover-translate-x:hover { transform: translateX(10px); }
    
    .line-clamp-2 {
        display: -webkit-box; 
        display: box;
        -webkit-line-clamp: 2; 
        line-clamp: 2;
        -webkit-box-orient: vertical; 
        box-orient: vertical;
        overflow: hidden;
    }

    /* Share Buttons */
    .share-btn {
        width: 40px; height: 40px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        background: #f1f5f9; color: #64748b; text-decoration: none;
        transition: all 0.3s ease;
    }
    .share-btn:hover { background: #007bff; color: #fff; transform: translateY(-3px); }
    .share-btn.wa:hover { background: #25d366; }

    @media (max-width: 991.98px) {
        .news-hero-section { height: 60vh; }
        .display-3 { font-size: 2.5rem; }
        .mt-neg-50 { margin-top: -40px; }
        .article-card { border-radius: 2rem !important; }
    }
</style>
