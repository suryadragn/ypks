<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\User $user */
/** @var string|null $error */

$this->title = 'Ganti Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-password-page container-fluid p-4">
    <div class="row">
        <div class="col-md-5 mx-auto">

            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-lg mb-4">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= Yii::$app->session->getFlash('success') ?>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded-lg mb-4">
                    <i class="fas fa-exclamation-circle mr-2"></i> <?= Html::encode($error) ?>
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            <?php endif; ?>

            <div class="card card-outline card-warning shadow rounded-lg overflow-hidden">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title font-weight-bold mb-0">
                        <i class="fas fa-key mr-2 text-warning"></i> Ganti Password
                    </h3>
                </div>
                <div class="card-body p-4 p-md-5">

                    <!-- User Info -->
                    <div class="d-flex align-items-center mb-5 pb-4 border-bottom">
                        <div class="bg-warning-soft rounded-circle p-3 mr-3 d-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                            <i class="fas fa-user-shield text-warning fa-lg"></i>
                        </div>
                        <div>
                            <div class="font-weight-bold text-dark"><?= Html::encode($user->username) ?></div>
                            <small class="text-muted"><?= Html::encode($user->email) ?></small>
                        </div>
                    </div>

                    <?php
                    $token = Yii::$app->request->csrfToken;
                    ?>
                    <form method="post" action="<?= Url::to(['user/change-password']) ?>">
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= $token ?>">

                        <div class="form-group mb-4">
                            <label class="font-weight-bold small text-uppercase text-muted ls-1">
                                <i class="fas fa-lock mr-1"></i> Password Lama
                            </label>
                            <input type="password" name="old_password" class="form-control py-3 rounded-lg"
                                   placeholder="Masukkan password saat ini" required autocomplete="current-password">
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold small text-uppercase text-muted ls-1">
                                <i class="fas fa-lock-open mr-1"></i> Password Baru
                            </label>
                            <input type="password" name="new_password" class="form-control py-3 rounded-lg"
                                   placeholder="Minimal 8 karakter" required minlength="8" autocomplete="new-password"
                                   id="new_password" oninput="checkStrength(this.value)">
                            <div class="mt-2" id="strength-bar" style="display:none;">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" id="strength-fill" style="width:0%; transition:all 0.3s;"></div>
                                </div>
                                <small id="strength-text" class="text-muted"></small>
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <label class="font-weight-bold small text-uppercase text-muted ls-1">
                                <i class="fas fa-check-double mr-1"></i> Konfirmasi Password Baru
                            </label>
                            <input type="password" name="confirm_password" class="form-control py-3 rounded-lg"
                                   placeholder="Ulangi password baru" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-4">
                            <?= Html::a('<i class="fas fa-arrow-left mr-1"></i> Kembali', ['site/index'], [
                                'class' => 'btn btn-outline-secondary rounded-pill px-4'
                            ]) ?>
                            <button type="submit" class="btn btn-warning rounded-pill px-5 font-weight-bold shadow-sm">
                                <i class="fas fa-save mr-1"></i> Simpan Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .change-password-page .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.2);
    }
    .bg-warning-soft { background-color: rgba(255, 193, 7, 0.12); }
    .ls-1 { letter-spacing: 1px; }
    .rounded-lg { border-radius: 12px !important; }
</style>

<script>
function checkStrength(val) {
    const bar = document.getElementById('strength-bar');
    const fill = document.getElementById('strength-fill');
    const text = document.getElementById('strength-text');
    bar.style.display = val.length ? 'block' : 'none';

    let score = 0;
    if (val.length >= 8) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;

    const levels = [
        { pct: '25%', cls: 'bg-danger',  msg: 'Lemah' },
        { pct: '50%', cls: 'bg-warning', msg: 'Sedang' },
        { pct: '75%', cls: 'bg-info',    msg: 'Kuat' },
        { pct: '100%',cls: 'bg-success', msg: 'Sangat Kuat' },
    ];
    const lvl = levels[Math.max(0, score - 1)];
    fill.style.width = lvl.pct;
    fill.className = 'progress-bar ' + lvl.cls;
    text.textContent = 'Kekuatan: ' + lvl.msg;
}
</script>
