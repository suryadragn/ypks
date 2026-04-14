<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\SocialProgramType[] $types */
/** @var common\models\SocialProgramType $selectedType */

$this->title = 'Program YPKS';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-program bg-white pb-5 min-vh-100">
    <!-- Immersive Header Section -->
    <div class="program-hero-section position-relative overflow-hidden mb-5 d-flex align-items-center justify-content-center text-center text-white" style="height: 50vh; min-height: 400px; background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.85)), url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1600&q=80') no-repeat center center; background-size: cover;">
        <div class="container position-relative z-index-2" data-aos="zoom-out">
            <span class="badge bg-primary text-uppercase px-4 py-2 rounded-pill mb-3 ls-2 shadow-sm font-weight-bold animate__animated animate__fadeInDown">
                Dharma Bakti Yayasan
            </span>
            <h1 class="display-3 fw-black mb-4 ls-neg-2 lh-1 text-shadow-lg animate__animated animate__fadeInUp">
                Program Sosial & <br><span class="text-primary-light">Kemanusiaan</span>
            </h1>
            <p class="lead mx-auto opacity-75 animate__animated animate__fadeInUp" style="max-width: 700px; animation-delay: 0.2s;">
                Menyalurkan kasih dan kepedulian melalui aksi nyata untuk membangun masyarakat yang lebih mandiri dan berdaya.
            </p>
        </div>
        <!-- Decorative abstract shape -->
        <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="height: 100px; transform: rotate(180deg);">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 100%; fill: #fff;">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V120c67.81-23.09,144.29-15.49,214.34-3,20,3.61,40.16,7.57,60.21,9.39Z"></path>
            </svg>
        </div>
    </div>

    <div class="container py-4">
        <!-- Dynamic Category Pills - Glassmorphism style -->
        <div class="row justify-content-center mb-5 pb-2" data-aos="fade-up">
            <div class="col-lg-12">
                <div class="glass-nav-container p-2 rounded-pill shadow-sm bg-light border d-inline-flex mx-auto d-flex flex-wrap justify-content-center gap-2">
                    <a href="<?= Url::to(['/site/program']) ?>" 
                       class="category-pill-modern filter-program <?= !$selectedType ? 'active' : '' ?>">
                        <i class="fas fa-th-large me-2"></i> Semua Program
                    </a>
                    
                    <?php foreach ($types as $type): ?>
                        <a href="<?= Url::to(['/site/program', 'id_type' => $type->id]) ?>" 
                           class="category-pill-modern filter-program <?= ($selectedType && $selectedType->id == $type->id) ? 'active' : '' ?>">
                            <i class="<?= $type->icon ?: 'fas fa-heart' ?> me-2"></i> <?= Html::encode($type->name) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php \yii\widgets\Pjax::begin(['id' => 'program-pjax-container', 'timeout' => 5000, 'enablePushState' => true]); ?>
        
        <!-- Loading Overlay -->
        <div id="pjax-loader" class="text-center py-5 d-none">
            <div class="spinner-grow text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2 text-muted fw-bold">Memperbarui Program...</p>
        </div>

        <div id="program-list-content">
            <!-- Program Cards - Premium Grid -->
            <div class="row g-5">
                <?php if (empty($dataProvider->getModels())): ?>
                    <div class="col-12 text-center py-5">
                        <div class="display-1 text-muted opacity-25 mb-3">🍃</div>
                        <h3 class="text-secondary fw-bold">Belum Ada Program</h3>
                        <p class="text-muted">Kategori ini sedang dipersiapkan, nantikan kabar baik segera.</p>
                    </div>
                <?php endif; ?>

                <?php foreach ($dataProvider->getModels() as $index => $model): ?>
                    <?php
                        $percent = $model->target_amount > 0 ? min(100, ($model->current_amount / $model->target_amount) * 100) : 0;
                    ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                        <div class="card h-100 border-0 program-premium-card overflow-hidden bg-white shadow-hover">
                            <!-- Floating category badge -->
                            <div class="position-absolute p-4" style="z-index: 3; top:0; right:0;">
                                <span class="badge glass-badge text-white px-3 py-2 rounded-pill fw-bold small ls-1">
                                    <?= Html::encode($model->type->name) ?>
                                </span>
                            </div>
                            
                            <!-- Image section with hover zoom -->
                            <?php 
                                $imgPath = Yii::getAlias('@public/uploads/programs/') . $model->image;
                                $displayUrl = ($model->image && file_exists($imgPath)) 
                                    ? Url::to('@web/uploads/programs/' . $model->image) 
                                    : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1200&q=80';
                            ?>
                            <div class="program-img-wrapper position-relative overflow-hidden" style="height: 260px;">
                                <div class="img-overlay"></div>
                                <?= Html::img($displayUrl, [
                                    'class' => 'card-img-top program-img-zoom w-100 h-100 object-fit-cover',
                                    'alt' => $model->title
                                ]) ?>
                            </div>
                            
                            <div class="card-body p-4 p-xl-5 d-flex flex-column">
                                <h4 class="card-title fw-bold text-dark mb-3 line-clamp-2 title-hover">
                                    <?= Html::encode($model->title) ?>
                                </h4>
                                <p class="card-text text-secondary mb-4 opacity-75 line-clamp-3 fs-6">
                                    <?= Html::encode($model->summary) ?>
                                </p>
                                
                                <!-- Premium Progress Bar -->
                                <?php if ($model->target_amount > 0): ?>
                                    <div class="mt-auto pt-2 mb-4">
                                        <div class="d-flex align-items-end justify-content-between mb-3">
                                            <div class="d-flex flex-column">
                                                <span class="text-muted extra-small text-uppercase ls-1 mb-1">TERKUMPUL</span>
                                                <span class="text-primary fw-black h5 mb-0">Rp <?= number_format($model->current_amount, 0, ',', '.') ?></span>
                                            </div>
                                            <div class="text-end">
                                                <span class="text-primary fw-black display-6" style="font-size: 1.5rem;"><?= round($percent) ?><small class="fs-6">%</small></span>
                                            </div>
                                        </div>
                                        <div class="progress rounded-pill shadow-inner overflow-hidden" style="height: 8px; background: #eef2f7;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                                                 role="progressbar" 
                                                 style="width: <?= $percent ?>%" 
                                                 aria-valuenow="<?= $percent ?>" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <span class="extra-small text-muted fw-bold text-uppercase">Target: Rp <?= number_format($model->target_amount, 0, ',', '.') ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="mt-auto d-grid pt-3">
                                    <button value="<?= Url::to(['/site/view-program', 'slug' => $model->slug]) ?>" 
                                            class="btn btn-primary btn-lg rounded-pill fw-bold shadow-primary hover-lift showModalButton" 
                                            title="<?= Html::encode($model->title) ?>">
                                        Detail Program <i class="fas fa-chevron-right ms-2 small"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Modern Pagination -->
            <?php if ($dataProvider->pagination->pageCount > 1): ?>
            <div class="mt-5 pt-5 d-flex justify-content-center">
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'options' => ['class' => 'pagination pagination-modern'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ]) ?>
            </div>
            <?php endif; ?>
        </div>

        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap');
    
    .site-program { font-family: 'Outfit', sans-serif; }
    .fw-black { font-weight: 900; }
    .ls-1 { letter-spacing: 1px; }
    .ls-2 { letter-spacing: 2px; }
    .ls-neg-2 { letter-spacing: -2px; }
    .text-shadow-lg { text-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .text-primary-light { color: #60a5fa; }
    .z-index-2 { z-index: 2; }
    .extra-small { font-size: 0.7rem; }
    .shadow-primary { box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4); }
    .shadow-inner { box-shadow: inset 0 2px 4px rgba(0,0,0,0.06); }

    /* Category Navigation */
    .glass-nav-container { 
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9) !important;
        max-width: 100%;
        margin-bottom: 20px;
    }
    .category-pill-modern {
        padding: 12px 28px;
        border-radius: 50px;
        color: #64748b;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 1rem;
        display: flex;
        align-items: center;
    }
    .category-pill-modern:hover {
        background: rgba(241, 245, 249, 1);
        color: #1e293b;
    }
    .category-pill-modern.active {
        background: #2563eb;
        color: #fff !important;
        box-shadow: 0 10px 20px -10px rgba(37, 99, 235, 0.6);
    }

    /* Premium Cards */
    .program-premium-card {
        border-radius: 35px;
        transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 10px 40px -15px rgba(0,0,0,0.08);
    }
    .program-premium-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px -12px rgba(0,0,0,0.12);
    }
    
    .glass-badge {
        background: rgba(255,255,255,0.2) !important;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .program-img-wrapper { border-radius: 35px 35px 0 0; }
    .img-overlay {
        position: absolute; top:0; left:0; width:100%; height:100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0) 60%, rgba(0,0,0,0.4) 100%);
        z-index: 1;
    }
    .program-img-zoom { transition: transform 1.2s cubic-bezier(0.165, 0.84, 0.44, 1); }
    .program-premium-card:hover .program-img-zoom { transform: scale(1.15); }
    
    .hover-lift { transition: all 0.3s ease; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.5); }
    
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-clamp: 2; overflow: hidden; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; line-clamp: 3; overflow: hidden; }
    
    .title-hover { transition: color 0.3s ease; }
    .program-premium-card:hover .title-hover { color: #2563eb !important; }

    /* Modern Pagination */
    .pagination-modern .page-link {
        border: none;
        margin: 0 5px;
        width: 50px;
        height: 50px;
        border-radius: 50% !important;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #475569;
        background: #f1f5f9;
        transition: all 0.3s ease;
    }
    .pagination-modern .page-item.active .page-link {
        background: #2563eb;
        color: #fff;
        box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.4);
    }
    .pagination-modern .page-link:hover { background: #e2e8f0; transform: scale(1.1); }
</style>

<?php
use yii\bootstrap5\Modal;

Modal::begin([
    'id' => 'modal',
    'size' => 'modal-lg',
    'headerOptions' => ['class' => 'border-0 px-4 pt-4 position-absolute', 'style' => 'z-index: 10; width: 100%; right:0;'],
    'bodyOptions' => ['class' => 'px-0 pt-0'],
]);
echo "<div id='modalContent'><div class='text-center py-5'><div class='spinner-border text-primary' role='status'><span class='visually-hidden'>Loading...</span></div></div></div>";
Modal::end();

$js = <<<JS
// Handle Category Filter Click
$(document).on('click', '.filter-program', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    
    // UI Update: Set active state immediately
    $('.filter-program').removeClass('active');
    $(this).addClass('active');
    
    // Show Loader
    $('#program-list-content').addClass('opacity-25');
    $('#pjax-loader').removeClass('d-none');
    
    // Trigger Pjax
    $.pjax.reload({
        url: url,
        container: '#program-pjax-container',
        timeout: 5000,
        push: true,
        replace: false
    });
});

// Modal detail trigger
$(document).on('click', '.showModalButton', function() {
    $('#modal').modal('show').find('#modalContent').html("<div class='text-center py-5'><div class='spinner-border text-primary' role='status'></div></div>").load($(this).attr('value'));
});

// Re-init AOS after Pjax finish
$(document).on('pjax:end', function() {
    $('#pjax-loader').addClass('d-none');
    $('#program-list-content').removeClass('opacity-25');
    
    // Re-initialize AOS for new elements
    if (typeof AOS !== 'undefined') {
        AOS.refresh();
    }
});
JS;
$this->registerJs($js);
?>
