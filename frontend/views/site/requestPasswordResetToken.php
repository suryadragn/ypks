<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\PasswordResetRequestForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset bg-light min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: linear-gradient(rgba(66, 32, 6, 0.75), rgba(66, 32, 6, 0.85)), url('<?= Url::to('@web/image/ypks_home.jpg') ?>') no-repeat center center; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-2xl rounded-4 overflow-hidden animate-up" data-aos="zoom-in">
                    <div class="card-header bg-white pt-5 pb-4 text-center border-0">
                        <a href="<?= Url::to(['site/index']) ?>" title="Kembali ke Beranda">
                            <img src="<?= Url::to('@web/image/logo-ypks.png') ?>" alt="Logo YPKS" style="height: 60px; transition: opacity 0.2s;" class="mb-3 d-block mx-auto" onmouseover="this.style.opacity='.7'" onmouseout="this.style.opacity='1'">
                        </a>
                        <div class="icon-circle bg-primary-soft mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
                            <i class="fas fa-key text-primary"></i>
                        </div>
                        <h2 class="fw-black text-dark mb-1">Reset Password</h2>
                        <p class="text-secondary opacity-75 small px-4">Masukkan email Anda untuk menerima tautan pemulihan kata sandi.</p>
                    </div>
                    <div class="card-body p-4 p-xl-5 pt-0">
                        <?php $form = ActiveForm::begin([
                            'id' => 'request-password-reset-form',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'form-label fw-bold small text-secondary px-1'],
                                'inputOptions' => ['class' => 'form-control py-3 border-light-subtle rounded-3'],
                            ],
                        ]); ?>

                        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'nama@email.com']) ?>

                        <div class="form-group mb-4 mt-4">
                            <?= Html::submitButton('KIRIM TAUTAN RESET', ['class' => 'btn btn-primary btn-lg w-100 rounded-pill fw-black py-3 shadow-primary hover-lift']) ?>
                        </div>

                        <div class="text-center mt-4">
                            <p class="small text-secondary mb-0">Teringat kembali? <?= Html::a('Kembali ke Login', ['site/login'], ['class' => 'text-primary fw-bold text-decoration-none']) ?></p>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .site-request-password-reset { font-family: 'Outfit', sans-serif; }
    .bg-primary-soft { background-color: rgba(234, 179, 8, 0.1); border-radius: 50%; }
    .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.45); }
    .rounded-4 { border-radius: 1.5rem; }
    .fw-black { font-weight: 900; }
    .shadow-primary { box-shadow: 0 10px 15px -3px rgba(234, 179, 8, 0.3); }
    .hover-lift:hover { transform: translateY(-3px); }
</style>
