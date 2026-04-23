<?php
/** @var yii\web\View $this */
/** @var common\models\Institution[] $institutions */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Lembaga Pendidikan - Yapendikra';
$this->params['breadcrumbs'][] = 'Lembaga Pendidikan';
?>

<div class="site-lembaga py-5 bg-light-soft">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-down">
            <h1 class="display-4 fw-bold text-gradient mb-3">Lembaga Pendidikan</h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Yapendikra menyelenggarakan berbagai lembaga pendidikan mulai dari tingkat dasar hingga pendidikan tinggi dengan komitmen kualitas terbaik.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <?php foreach ($institutions as $inst): ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card h-100 border-0 shadow-sm institution-full-card rounded-4 p-4 text-center">
                        <div class="logo-wrapper mb-4 mx-auto d-flex align-items-center justify-content-center bg-white shadow-sm p-3 rounded-circle">
                            <?php 
                                // Deteksi logo dari upload atau folder image
                                $logoUrl = null;
                                if ($inst->logo) {
                                    if (strpos($inst->logo, 'http') === 0) {
                                        $logoUrl = $inst->logo;
                                    } elseif (file_exists(Yii::getAlias('@public/uploads/institution/') . $inst->logo)) {
                                        $logoUrl = Url::to('@web/uploads/institution/' . $inst->logo);
                                    } elseif (file_exists(Yii::getAlias('@public/image/') . $inst->logo)) {
                                        $logoUrl = Url::to('@web/image/' . $inst->logo);
                                    }
                                }
                            ?>
                            
                            <?php if ($logoUrl): ?>
                                <img src="<?= $logoUrl ?>" alt="<?= Html::encode($inst->name) ?>" class="img-fluid institution-logo">
                            <?php else: ?>
                                <div class="placeholder-logo text-primary">
                                    <span style="font-size: 3.5rem;">🏫</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <h4 class="fw-bold mb-3 text-dark"><?= Html::encode($inst->name) ?></h4>
                        
                        <div class="card-text text-muted mb-4 small flex-grow-1">
                            <?= Html::encode($inst->description) ?>
                        </div>
                        
                        <div class="mt-auto pt-3">
                            <a href="<?= Url::to(['site/view-lembaga', 'id' => $inst->id]) ?>" class="btn btn-outline-primary rounded-pill px-4 btn-sm fw-bold">
                                Kunjungi Profil <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
    .text-gradient {
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .institution-full-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(0, 0, 0, 0.03);
    }
    .institution-full-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08) !important;
        background: #fff;
    }
    .logo-wrapper { width: 120px; height: 120px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .institution-logo { max-height: 80px; object-fit: contain; }
    .institution-full-card:hover .logo-wrapper { transform: scale(1.1) rotate(5deg); }
    .bg-light-soft { background-color: #f8fafc; }
</style>