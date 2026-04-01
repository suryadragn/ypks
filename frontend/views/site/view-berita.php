<?php

/** @var yii\web\View $this */
/** @var common\models\News $model */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Berita', 'url' => ['site/berita']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-news-view mb-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <header class="news-header mb-4 pt-3">
                    <div class="news-category-label bg-primary text-white d-inline-block px-3 py-1 rounded-pill mb-3 small fw-bold text-uppercase" style="letter-spacing: 1px;">
                        <?= Html::encode($model->category ?: 'BERITA') ?>
                    </div>
                    <h1 class="display-5 fw-extrabold mb-3 text-dark"><?= Html::encode($model->title) ?></h1>
                    
                    <div class="news-meta d-flex align-items-center gap-4 text-muted small border-bottom pb-4 mb-4">
                        <div class="meta-item">
                            <i class="bi bi-person-circle text-primary me-1"></i>
                            By <span class="fw-bold text-dark"><?= Html::encode($model->author ?: 'Yii Admin') ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-calendar-event text-primary me-1"></i>
                            <?= Yii::$app->formatter->asDate($model->publish_date ?: $model->created_at, 'long') ?>
                        </div>
                    </div>
                </header>

                <div class="news-main-image mb-5 shadow-lg rounded-4 overflow-hidden">
                    <?php 
                        $imageUrl = $model->image ? Url::to(Yii::getAlias('@web/uploads/news/') . $model->image, true) : 'https://images.unsplash.com/photo-1585829365295-ab7cd400c167?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80'; 
                    ?>
                    <img src="<?= Html::encode($imageUrl) ?>" alt="<?= Html::encode($model->title) ?>" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
                </div>

                <article class="news-content-body lead-relaxed text-dark" style="font-size: 1.1rem; line-height: 1.8;">
                    <?= nl2br($model->content) ?>
                </article>

                <div class="mt-5 pt-4 border-top">
                    <a href="<?= Url::to(['site/berita']) ?>" class="btn btn-outline-primary rounded-pill px-4">
                        <i class="bi bi-arrow-left me-2"></i> Kembali ke Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
.lead-relaxed {
    letter-spacing: -0.015em;
    color: #1e293b;
}

.fw-extrabold {
    font-weight: 800;
    letter-spacing: -1px;
}

.news-main-image {
    position: relative;
    transition: all 0.5s ease;
}

.news-main-image:hover {
    transform: scale(1.02);
}

.meta-item {
    display: flex;
    align-items: center;
}
</style>
