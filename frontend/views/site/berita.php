<?php

/** @var yii\web\View $this */
/** @var common\models\News[] $newsList */

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = 'Berita & Artikel - Yapendikra';
$this->params['breadcrumbs'][] = 'Berita';
?>
<div class="site-berita bg-light-soft pb-5 min-vh-100">
    <!-- Header Hero -->
    <div class="container-fluid bg-dark py-5 mb-5 text-white text-center position-relative overflow-hidden" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1504711432869-5d39a110fdd7?auto=format&fit=crop&w=1500&q=80'); background-size: cover; background-position: center;">
        <div class="container py-4 animate-up">
            <h1 class="display-4 fw-black text-uppercase border-bottom d-inline-block pb-3 mb-4">Warta Yapendikra</h1>
            <p class="lead opacity-75">Jendela Informasi Seputar Yayasan & Seluruh Lembaga Pendidikan Kami</p>
        </div>
    </div>

    <div class="container">
        <div class="row g-4">
            <?php if (!empty($newsList)): ?>
                <?php foreach ($newsList as $index => $news): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 50 ?>">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden news-card-premium">
                            <?php 
                                // Image handling with fallback
                                $imageUrl = null;
                                if ($news->image && file_exists(Yii::getAlias('@public/uploads/news/') . $news->image)) {
                                    $imageUrl = Url::to('@web/uploads/news/' . $news->image);
                                } else {
                                    $imageUrl = 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';
                                }
                            ?>
                            <div class="card-img-container">
                                <img src="<?= $imageUrl ?>" class="card-img-top news-image" alt="<?= Html::encode($news->title) ?>">
                                <div class="news-date-badge shadow-sm">
                                    <span class="day font-weight-bold d-block"><?= date('d', strtotime($news->publish_date ?: date('Y-m-d', $news->created_at))) ?></span>
                                    <span class="month small text-uppercase"><?= date('M', strtotime($news->publish_date ?: date('Y-m-d', $news->created_at))) ?></span>
                                </div>
                            </div>
                            
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="badge bg-primary-soft text-primary text-uppercase px-3 py-2 rounded-pill font-weight-bold" style="font-size: 0.65rem; letter-spacing: 1px;">
                                        <?= Html::encode($news->category ?: 'BERITA') ?>
                                    </span>
                                    <span class="mx-2 text-muted opacity-25">|</span>
                                    <span class="small text-muted"><i class="far fa-user mr-1"></i> Admin</span>
                                </div>
                                
                                <h4 class="card-title fw-bold mb-3">
                                    <?= Html::a(Html::encode($news->title), ['site/view-berita', 'id' => $news->id], ['class' => 'text-dark hover-primary text-decoration-none h4 d-block']) ?>
                                </h4>
                                
                                <p class="card-text text-muted small mb-4" style="line-height: 1.7;">
                                    <?= Html::encode(StringHelper::truncateWords(strip_tags($news->content), 20)) ?>
                                </p>
                                
                                <div class="mt-auto">
                                    <a href="<?= Url::to(['site/view-berita', 'id' => $news->id]) ?>" class="btn btn-link text-primary font-weight-bold p-0 text-decoration-none">
                                        Selengkapnya <i class="fas fa-arrow-right ml-2 small"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="mb-4 display-3 text-light">📰</div>
                    <h3 class="text-dark-50">Belum Ada Berita</h3>
                    <p class="text-muted">Kunjungi kembali nanti untuk update terbaru dari Yapendikra.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .bg-light-soft { background-color: #f9fafb; }
    .fw-black { font-weight: 900; }
    .rounded-4 { border-radius: 12px; }
    .bg-primary-soft { background-color: rgba(37, 99, 235, 0.1); }
    
    /* News Card Styles */
    .news-card-premium { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .news-card-premium:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    
    .card-img-container { position: relative; overflow: hidden; height: 220px; }
    .news-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .news-card-premium:hover .news-image { transform: scale(1.1); }
    
    .news-date-badge {
        position: absolute; top: 20px; left: 20px;
        background: #fff; width: 60px; height: 60px;
        border-radius: 10px; display: flex; flex-direction: column;
        align-items: center; justify-content: center; line-height: 1.1;
    }
    .news-date-badge .day { font-size: 1.4rem; color: #1e293b; }
    .news-date-badge .month { color: #2563eb; }
    
    .hover-primary:hover { color: #2563eb !important; }
    .animate-up { animation: fadeInUp 0.8s ease-out; }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
