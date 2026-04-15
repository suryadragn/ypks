<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$this->title = 'Admin Central - YPKS';
?>

<div class="site-login-backend">
    <!-- Animated BG blobs -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="login-wrapper">
        <!-- Logo & Branding -->
        <div class="login-branding">
            <div class="logo-glow">
                <img src="/image/logo-ypks.png" alt="Logo YPKS" class="logo-img">
            </div>
            <h1 class="brand-title">ADMINISTRASI</h1>
            <p class="brand-subtitle">Yayasan Pendidikan Karanganyar Surakarta</p>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            <!-- Gold accent line -->
            <div class="gold-accent-bar"></div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'field-label'],
                    'inputOptions' => ['class' => 'form-control field-input'],
                ],
            ]); ?>

            <div class="field-group mb-4">
                <?= $form->field($model, 'username')->textInput([
                    'autofocus'    => true,
                    'placeholder'  => 'Masukkan username Anda',
                    'autocomplete' => 'off',
                ])->label('<i class="fas fa-user-shield"></i> Username', ['class' => 'field-label', 'encode' => false]) ?>
            </div>

            <div class="field-group mb-3">
                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Masukkan kata sandi',
                ])->label('<i class="fas fa-lock"></i> Password', ['class' => 'field-label', 'encode' => false]) ?>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <?= $form->field($model, 'rememberMe', [
                    'template' => "<div class=\"form-check remember-check\">{input}\n{label}</div>",
                    'labelOptions' => ['class' => 'form-check-label remember-label'],
                ])->checkbox(['class' => 'form-check-input'], false) ?>
                <span class="text-muted-light small">Sesi otomatis</span>
            </div>

            <div class="form-group mt-4 mb-2">
                <?= Html::submitButton(
                    '<i class="fas fa-sign-in-alt me-2"></i> MASUK PANEL KONTROL',
                    ['class' => 'btn-login', 'name' => 'login-button', 'encode' => false]
                ) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <!-- Footer Link -->
        <div class="login-footer">
            <a href="/" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali ke Website Utama
            </a>
        </div>
    </div>
</div>

<style>
    /* === RESET & BASE === */
    *, *::before, *::after { box-sizing: border-box; }

    .site-login-backend {
        font-family: 'Outfit', 'Inter', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #060c1a 0%, #0d1b2e 40%, #0f172a 100%);
        padding: 2rem 1rem;
    }

    /* === ANIMATED BACKGROUND BLOBS === */
    .blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.15;
        animation: blobFloat 8s ease-in-out infinite alternate;
        pointer-events: none;
    }
    .blob-1 {
        width: 500px; height: 500px;
        background: radial-gradient(circle, #facc15, transparent);
        top: -150px; left: -150px;
        animation-delay: 0s;
    }
    .blob-2 {
        width: 400px; height: 400px;
        background: radial-gradient(circle, #b45309, transparent);
        bottom: -100px; right: -100px;
        animation-delay: 3s;
    }
    .blob-3 {
        width: 300px; height: 300px;
        background: radial-gradient(circle, #1d4ed8, transparent);
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        animation-delay: 1.5s;
        opacity: 0.08;
    }
    @keyframes blobFloat {
        0%   { transform: scale(1)   translate(0, 0); }
        100% { transform: scale(1.2) translate(30px, -30px); }
    }

    /* === WRAPPER === */
    .login-wrapper {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 460px;
    }

    /* === BRANDING === */
    .login-branding {
        text-align: center;
        margin-bottom: 2rem;
        animation: fadeDown 0.7s ease both;
    }
    .logo-glow {
        display: inline-block;
        padding: 1rem;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        margin-bottom: 1.25rem;
        box-shadow: 0 0 40px rgba(250,204,21,0.12);
        backdrop-filter: blur(6px);
    }
    .logo-img { height: 90px; filter: drop-shadow(0 0 12px rgba(250,204,21,0.4)); }
    .brand-title {
        font-size: 1.5rem;
        font-weight: 900;
        color: #fff;
        letter-spacing: 4px;
        margin-bottom: 0.25rem;
        text-shadow: 0 0 20px rgba(250,204,21,0.3);
    }
    .brand-subtitle {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.4);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0;
    }

    /* === LOGIN CARD === */
    .login-card {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow:
            0 25px 50px rgba(0,0,0,0.5),
            inset 0 1px 0 rgba(255,255,255,0.06);
        animation: fadeUp 0.7s ease 0.1s both;
    }

    /* Gold accent bar */
    .gold-accent-bar {
        width: 60px; height: 4px;
        background: linear-gradient(to right, #facc15, #b45309);
        border-radius: 2px;
        margin: 0 auto 2rem;
    }

    /* === FORM FIELDS === */
    .field-label {
        color: rgba(255,255,255,0.55) !important;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
        display: block;
    }
    .field-input {
        background: rgba(255,255,255,0.06) !important;
        border: 1px solid rgba(255,255,255,0.1) !important;
        border-radius: 12px !important;
        color: #fff !important;
        padding: 0.85rem 1rem !important;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    .field-input::placeholder { color: rgba(255,255,255,0.25) !important; }
    .field-input:focus {
        background: rgba(255,255,255,0.1) !important;
        border-color: #facc15 !important;
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(250,204,21,0.15) !important;
    }

    /* === REMEMBER ME === */
    .remember-check { display: flex; align-items: center; gap: 0.5rem; }
    .remember-label { color: rgba(255,255,255,0.45) !important; font-size: 0.85rem; cursor: pointer; }
    .text-muted-light { color: rgba(255,255,255,0.3); }

    /* === SUBMIT BUTTON === */
    .btn-login {
        display: block;
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #facc15, #eab308);
        border: none;
        border-radius: 100px;
        color: #1a1a1a;
        font-family: 'Outfit', sans-serif;
        font-size: 0.85rem;
        font-weight: 900;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(234,179,8,0.35);
    }
    .btn-login:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(234,179,8,0.45);
        background: linear-gradient(135deg, #fde047, #facc15);
    }
    .btn-login:active { transform: translateY(0); }

    /* === FOOTER LINK === */
    .login-footer {
        text-align: center;
        margin-top: 2rem;
        animation: fadeUp 0.7s ease 0.2s both;
    }
    .back-link {
        color: rgba(255,255,255,0.3);
        font-size: 0.8rem;
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: color 0.3s ease;
    }
    .back-link:hover { color: #facc15; }

    /* === ANIMATIONS === */
    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* === VALIDATION ERRORS === */
    .help-block { color: #f87171; font-size: 0.8rem; margin-top: 0.35rem; }

    @media (max-width: 576px) {
        .login-card { padding: 1.75rem; }
        .brand-title { font-size: 1.2rem; }
    }
</style>