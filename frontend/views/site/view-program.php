<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\SocialProgram $model */

$percent = $model->target_amount > 0 ? min(100, ($model->current_amount / $model->target_amount) * 100) : 0;
?>
<div class="program-view-modal px-0">
    <!-- Immersive Header Image -->
    <div class="position-relative overflow-hidden mb-5 d-flex align-items-end" style="border-radius: 0 0 40px 40px; height: 450px; background: url('<?= $model->image ? Url::to('@web/uploads/programs/' . $model->image) : 'https://images.unsplash.com/photo-1542601906990-b4d3fb773b09?auto=format&fit=crop&w=1200' ?>') center/cover no-repeat;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.8) 100%);"></div>
        
        <div class="container position-relative z-index-2 px-4 p-xl-5 pb-5 w-100">
            <span class="badge glass-badge text-white px-3 py-2 rounded-pill fw-bold small ls-1 mb-3 sparkle-effect">
                <i class="<?= $model->type->icon ?: 'fas fa-heart' ?> me-2"></i> <?= Html::encode($model->type->name) ?>
            </span>
            <h1 class="display-5 fw-black text-white mb-0 ls-n1">
                <?= Html::encode($model->title) ?>
            </h1>
        </div>
    </div>

    <!-- Body Content Section -->
    <div class="container px-4 px-xl-5 pb-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <!-- Donation Progress Tracker (Large) -->
                <?php if ($model->target_amount > 0): ?>
                <div class="donation-tracker-modern mb-5 p-4 p-xl-5 rounded-4 shadow-sm border" style="background: #ffffff;">
                    <div class="row align-items-center">
                        <div class="col-md-7 mb-4 mb-md-0">
                            <h5 class="fw-black text-dark mb-4 text-uppercase ls-1">INFO PENGGALANGAN DANA</h5>
                            <div class="row g-4 mb-4">
                                <div class="col-6">
                                    <div class="d-flex flex-column">
                                        <span class="text-muted extra-small text-uppercase ls-1 mb-1">TERKUMPUL</span>
                                        <span class="text-primary fw-black h3 mb-0">Rp <?= number_format($model->current_amount, 0, ',', '.') ?></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column text-end">
                                        <span class="text-muted extra-small text-uppercase ls-1 mb-1">TARGET</span>
                                        <span class="text-dark fw-bold h5 mb-0 opacity-75">Rp <?= number_format($model->target_amount, 0, ',', '.') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="progress rounded-pill shadow-inner overflow-hidden" style="height: 12px; background: #eef2f7;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                                     role="progressbar" 
                                     style="width: <?= $percent ?>%" 
                                     aria-valuenow="<?= $percent ?>" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 text-center">
                            <div class="d-inline-flex flex-column align-items-center justify-content-center bg-primary text-white rounded-circle shadow-primary" style="width: 140px; height: 140px; border: 8px solid rgba(255,255,255,0.2);">
                                <span class="h1 fw-black mb-0"><?= round($percent) ?><small class="fs-6">%</small></span>
                                <span class="extra-small fw-bold opacity-75">TERCAPAI</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Article Content -->
                <div class="article-body-text fs-5 text-secondary mb-5 pe-lg-4" style="line-height: 1.8; text-align: justify;">
                    <?= $model->content ?>
                </div>

                <!-- Transaction Details (Banking & Contact) -->
                <?php if ($model->donationAccount): ?>
                <div class="donation-card-premium p-4 p-xl-5 rounded-4 shadow-sm border" style="background: #f8fafc;">
                    <div class="row align-items-center">
                        <div class="col-md-7 border-end-md pe-md-4 mb-4 mb-md-0">
                            <h5 class="fw-black text-dark mb-4 text-uppercase ls-1 d-flex align-items-center">
                                <i class="fas fa-credit-card text-primary me-2"></i> Metode Donasi
                            </h5>
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-white shadow-sm rounded-3 p-3 me-3">
                                    <i class="fas fa-university text-primary fs-4"></i>
                                </div>
                                <div>
                                    <div class="text-muted small text-uppercase fw-bold ls-1 mb-1 font-outfit"><?= Html::encode($model->donationAccount->bank_name) ?></div>
                                    <div class="h4 fw-black text-dark mb-0 font-monospace ls-1 fs-3"><?= Html::encode($model->donationAccount->account_number) ?></div>
                                </div>
                            </div>
                            <div class="ps-5 ms-3 pt-1">
                                <div class="text-secondary small fw-medium">Atas Nama:</div>
                                <div class="text-dark fw-bold"><?= Html::encode($model->donationAccount->account_holder) ?></div>
                            </div>
                        </div>
                        <div class="col-md-5 ps-md-4">
                            <h5 class="fw-black text-dark mb-4 text-uppercase ls-1 d-flex align-items-center">
                                <i class="fas fa-user-circle text-primary me-2"></i> Layanan Informasi
                            </h5>
                            <?php if ($model->donationAccount->contact_phone): ?>
                                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $model->donationAccount->contact_phone) ?>?text=Halo%20Admin%20Yapendikra,%20saya%20ingin%20berdonasi%20untuk%20program:%20<?= urlencode($model->title) ?>" 
                                   target="_blank" 
                                   class="btn btn-success btn-lg w-100 rounded-pill shadow-success d-flex align-items-center justify-content-center py-3 hover-lift fw-black font-outfit">
                                    <i class="fab fa-whatsapp me-2 fs-4"></i> KONFIRMAST DONASI
                                </a>
                                <div class="text-center mt-3">
                                    <span class="text-muted small">WhatsApp: <span class="fw-bold text-dark"><?= Html::encode($model->donationAccount->contact_name) ?></span></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="modal-footer border-0 px-0 pt-0 mt-5">
                    <button type="button" class="btn btn-light btn-lg rounded-pill px-5 fw-bold" data-bs-dismiss="modal">Tutup</button>
                    <?php if ($model->donationAccount && $model->donationAccount->contact_phone): ?>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $model->donationAccount->contact_phone) ?>?text=Saya%20tertarik%20dengan%20program%20<?= urlencode($model->title) ?>" class="btn btn-primary btn-lg rounded-pill px-5 fw-black hover-lift shadow-primary ms-3">
                            Tanya Program <i class="fas fa-question-circle ms-1 small"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.fw-black { font-weight: 900; }
.ls-n1 { letter-spacing: -1.5px; }
.ls-1 { letter-spacing: 0.5px; }
.shadow-primary { box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4); }
.shadow-success { box-shadow: 0 10px 20px -5px rgba(25, 135, 84, 0.4); }
.font-outfit { font-family: 'Outfit', sans-serif !important; }
.sparkle-effect { backdrop-filter: blur(10px); background: rgba(255,255,255,0.2) !important; border: 1px solid rgba(255,255,255,0.3) !important; }
@media (min-width: 768px) {
    .border-end-md { border-right: 2px solid #e2e8f0 !important; }
}
</style>
