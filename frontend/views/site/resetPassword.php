<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResetPasswordForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password bg-light min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: linear-gradient(rgba(66, 32, 6, 0.75), rgba(66, 32, 6, 0.85)), url('<?= Url::to('@web/image/ypks_home.jpg') ?>') no-repeat center center; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-2xl rounded-4 overflow-hidden animate-up" data-aos="zoom-in">
                    <div class="card-header bg-white pt-5 pb-4 text-center border-0">
                        <div class="icon-circle bg-success-soft mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
                            <i class="fas fa-lock-open text-success"></i>
                        </div>
                        <h2 class="fw-black text-dark mb-1">Berhasil!</h2>
                        <p class="text-secondary opacity-75 small px-4">Tautan diverifikasi. Silakan masukkan kata sandi baru Anda.</p>
                    </div>
                    <div class="card-body p-4 p-xl-5 pt-0">
                        <?php $form = ActiveForm::begin([
                            'id' => 'reset-password-form',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'form-label fw-bold small text-secondary px-1'],
                                'inputOptions' => ['class' => 'form-control py-3 border-light-subtle rounded-3'],
                            ],
                        ]); ?>

                        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'placeholder' => 'Pilih kata sandi baru']) ?>

                        <div class="form-group mb-4 mt-4">
                            <?= Html::submitButton('SIMPAN KATA SANDI BARU', ['class' => 'btn btn-primary btn-lg w-100 rounded-pill fw-black py-3 shadow-primary hover-lift']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .site-reset-password { font-family: 'Outfit', sans-serif; }
    .bg-success-soft { background-color: rgba(25, 135, 84, 0.1); border-radius: 50%; }
    .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.45); }
    .rounded-4 { border-radius: 1.5rem; }
    .fw-black { font-weight: 900; }
    .shadow-primary { box-shadow: 0 10px 15px -3px rgba(234, 179, 8, 0.3); }
    .hover-lift:hover { transform: translateY(-3px); }
</style>
