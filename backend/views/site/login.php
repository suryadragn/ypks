<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Admin Central - YPKS';
?>

<div class="site-login-backend min-vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
    <div class="login-container w-100 px-4" style="max-width: 450px;">
        <div class="text-center mb-5">
            <img src="<?= Yii::getAlias('@public/image/logo-ypks.png') ?>" alt="Logo YPKS" style="height: 100px; filter: drop-shadow(0 0 10px rgba(255,255,255,0.1));" class="mb-4">
            <h1 class="h3 fw-black text-white mb-1 ls-1">ADMINISTRASI</h1>
            <p class="text-light opacity-50 small text-uppercase ls-2">Yayasan Pendidikan Karanganyar Surakarta</p>
        </div>

        <div class="card border-0 shadow-lg p-5" style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.05) !important; border-radius: 24px;">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'form-label text-white-50 small mb-2'],
                    'inputOptions' => ['class' => 'form-control form-control-dark py-3 rounded-3 shadow-none'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username', 'autocomplete' => 'off']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>

            <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
                <?= $form->field($model, 'rememberMe', [
                    'template' => "<div class=\"form-check\">{input}\n{label}</div>",
                    'labelOptions' => ['class' => 'form-check-label small text-white-50 cursor-pointer'],
                ])->checkbox(['class' => 'form-check-input bg-transparent border-secondary'], false) ?>
            </div>

            <div class="form-group mb-0 mt-2">
                <?= Html::submitButton('MASUK PANEL KONTROL', ['class' => 'btn btn-primary btn-lg w-100 rounded-pill fw-black py-3 ls-1 shadow-primary hover-lift', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?= Yii::$app->urlManagerFrontend->createUrl(['site/index']) ?>" class="text-white-50 small text-decoration-none hover-white transition-all">
                <i class="fas fa-long-arrow-alt-left me-2"></i> Kembali ke Website Utama
            </a>
        </div>
    </div>
</div>

<style>
    .site-login-backend { font-family: 'Inter', 'Outfit', sans-serif; }
    .form-control-dark {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
    }
    .form-control-dark:focus {
        background-color: rgba(255, 255, 255, 0.1) !important;
        border-color: #facc15 !important;
    }
    .text-white-50 { color: rgba(255, 255, 255, 0.5) !important; }
    .fw-black { font-weight: 900; }
    .ls-1 { letter-spacing: 1px; }
    .ls-2 { letter-spacing: 2px; }
    .shadow-primary { box-shadow: 0 8px 20px -5px rgba(234, 179, 8, 0.4); }
    .hover-lift { transition: all 0.2s ease; }
    .hover-lift:hover { transform: translateY(-2px); opacity: 0.95; }
    .hover-white:hover { color: #fff !important; }
    .transition-all { transition: all 0.3s ease; }
</style>
