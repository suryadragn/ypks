<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup bg-light min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: linear-gradient(rgba(66, 32, 6, 0.7), rgba(66, 32, 6, 0.8)), url('<?= Url::to('@web/image/ypks_home.jpg') ?>') no-repeat center center; background-size: cover;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-2xl rounded-4 overflow-hidden animate-up" data-aos="zoom-in">
                    <div class="card-header bg-white pt-5 pb-4 text-center border-0">
                        <a href="<?= Url::to(['site/index']) ?>" title="Kembali ke Beranda">
                            <img src="<?= Url::to('@web/image/logo-ypks.png') ?>" alt="Logo YPKS" style="height: 80px; transition: opacity 0.2s;" class="mb-4" onmouseover="this.style.opacity='.7'" onmouseout="this.style.opacity='1'">
                        </a>
                        <h2 class="fw-black text-dark mb-1">Daftar Akun</h2>
                        <p class="text-secondary opacity-75 small text-uppercase ls-1">Bergabunglah bersama keluarga besar YPKS</p>
                    </div>
                    <div class="card-body p-4 p-xl-5">
                        <?php $form = ActiveForm::begin([
                            'id' => 'form-signup',
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n{error}",
                                'labelOptions' => ['class' => 'form-label fw-bold small text-secondary px-1'],
                                'inputOptions' => ['class' => 'form-control py-3 border-light-subtle rounded-3 transition-all'],
                            ],
                        ]); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Pilih Username']) ?>

                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Alamat Email Aktif']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Buat Kata Sandi']) ?>

                        <div class="form-group mb-4 mt-4">
                            <?= Html::submitButton('DAFTAR SEKARANG', ['class' => 'btn btn-primary btn-lg w-100 rounded-pill fw-black py-3 shadow-primary hover-lift', 'name' => 'signup-button']) ?>
                        </div>

                        <div class="text-center mt-4 border-top pt-4">
                            <p class="small text-secondary mb-0">Sudah memiliki akun? <?= Html::a('Masuk di sini', ['site/login'], ['class' => 'text-primary fw-bold text-decoration-none']) ?></p>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .site-signup {
        font-family: 'Outfit', sans-serif;
    }

    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.45);
    }

    .rounded-4 {
        border-radius: 1.5rem;
    }

    .fw-black {
        font-weight: 900;
    }

    .ls-1 {
        letter-spacing: 1px;
    }

    .transition-all {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #eab308;
        box-shadow: 0 0 0 0.25rem rgba(234, 179, 8, 0.15);
    }

    .shadow-primary {
        box-shadow: 0 10px 15px -3px rgba(234, 179, 8, 0.3);
    }

    .hover-lift {
        transition: transform 0.2s ease;
    }

    .hover-lift:hover {
        transform: translateY(-3px);
    }
</style>