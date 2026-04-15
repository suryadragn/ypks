<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manajemen User & Verifikasi Akun';
$this->params['breadcrumbs'][] = $this->title;

$pendingCount = User::find()->where(['status' => User::STATUS_INACTIVE])->andWhere(['!=', 'status', User::STATUS_DELETED])->count();
?>
<div class="user-index container-fluid p-4">

    <?php if ($pendingCount > 0): ?>
    <div class="alert alert-warning alert-dismissible fade show shadow-sm rounded-lg mb-4" role="alert">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        <strong><?= $pendingCount ?> akun</strong> menunggu verifikasi manual dari admin.
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    <?php endif; ?>

    <div class="card card-outline card-primary shadow-sm rounded-lg overflow-hidden">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title font-weight-bold mb-0">
                <i class="fas fa-users-cog mr-2 text-primary"></i>
                <?= Html::encode($this->title) ?>
                <?php if ($pendingCount > 0): ?>
                    <span class="badge badge-warning ml-2"><?= $pendingCount ?> Pending</span>
                <?php endif; ?>
            </h3>
            <small class="text-muted">Verifikasi akun signup tanpa perlu email</small>
        </div>

        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'rowOptions' => function ($model) {
                    return $model->status !== User::STATUS_ACTIVE
                        ? ['class' => 'table-warning']
                        : [];
                },
                'tableOptions' => ['class' => 'table table-hover mb-0'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 50px']],
                    [
                        'attribute' => 'username',
                        'label' => 'Nama User',
                        'value' => function ($model) {
                            $roleBadge = $model->is_superadmin
                                ? '<span class="badge badge-danger">SUPERADMIN</span>'
                                : '<span class="badge badge-info">STAF</span>';
                            return "<strong>$model->username</strong> $roleBadge<br><small class='text-muted'>$model->email</small>";
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Status Akun',
                        'value' => function ($model) {
                            if ($model->status === User::STATUS_ACTIVE) {
                                return '<span class="badge badge-success px-3 py-2"><i class="fas fa-check-circle mr-1"></i> Aktif</span>';
                            } elseif ($model->status === User::STATUS_INACTIVE) {
                                return '<span class="badge badge-warning px-3 py-2"><i class="fas fa-clock mr-1"></i> Menunggu Verifikasi</span>';
                            }
                            return '<span class="badge badge-danger px-3 py-2"><i class="fas fa-ban mr-1"></i> Dihapus</span>';
                        },
                        'format' => 'raw',
                        'contentOptions' => ['style' => 'width: 200px'],
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Tgl Daftar',
                        'value' => fn($m) => date('d M Y, H:i', $m->created_at),
                        'contentOptions' => ['class' => 'text-muted small', 'style' => 'width: 160px'],
                    ],
                    [
                        'label' => 'Aksi',
                        'format' => 'raw',
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width: 220px'],
                        'value' => function ($model) {
                            $buttons = '';

                            // Verify button
                            if ($model->status !== User::STATUS_ACTIVE) {
                                $buttons .= Html::a(
                                    '<i class="fas fa-check-circle mr-1"></i> Verifikasi',
                                    ['user/verify', 'id' => $model->id],
                                    [
                                        'class' => 'btn btn-xs btn-success rounded-pill px-2 mr-1',
                                        'data-confirm' => "Verifikasi & aktifkan akun \"$model->username\"?",
                                        'data-method' => 'post',
                                        'encode' => false,
                                    ]
                                );
                            } else {
                                $buttons .= Html::a(
                                    '<i class="fas fa-pause-circle mr-1"></i> Nonaktifkan',
                                    ['user/deactivate', 'id' => $model->id],
                                    [
                                        'class' => 'btn btn-xs btn-outline-warning rounded-pill px-2 mr-1',
                                        'data-confirm' => "Nonaktifkan akun \"$model->username\"?",
                                        'data-method' => 'post',
                                        'encode' => false,
                                    ]
                                );
                            }

                            // Edit permissions button
                            $buttons .= Html::a(
                                '<i class="fas fa-edit"></i>',
                                ['user/update', 'id' => $model->id],
                                ['class' => 'btn btn-xs btn-outline-primary rounded-pill px-2 mr-1', 'title' => 'Atur Hak Akses']
                            );

                            // Reset password button (superadmin force-reset)
                            $buttons .= '<button type="button" class="btn btn-xs btn-outline-secondary rounded-pill px-2 mr-1 btn-reset-pw"'
                                . ' data-id="' . $model->id . '"'
                                . ' data-username="' . Html::encode($model->username) . '"'
                                . ' data-toggle="modal" data-target="#resetPwModal"'
                                . ' title="Reset Password">'
                                . '<i class="fas fa-key"></i></button>';

                            // Delete button (not self)
                            if ($model->id != Yii::$app->user->id) {
                                $buttons .= Html::a(
                                    '<i class="fas fa-trash"></i>',
                                    ['user/delete', 'id' => $model->id],
                                    [
                                        'class' => 'btn btn-xs btn-outline-danger rounded-pill px-2',
                                        'data-confirm' => "Hapus akun \"$model->username\" secara permanen?",
                                        'data-method' => 'post',
                                        'encode' => false,
                                    ]
                                );
                            }

                            return $buttons;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<style>
    .table-warning td { background-color: rgba(255, 193, 7, 0.08) !important; }
    .btn-xs { font-size: 0.75rem; padding: 0.2rem 0.6rem; }
</style>

<!-- ===== RESET PASSWORD MODAL ===== -->
<div class="modal fade" id="resetPwModal" tabindex="-1" role="dialog" aria-labelledby="resetPwModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg rounded-lg overflow-hidden">

            <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #1e293b, #334155);">
                <div class="d-flex align-items-center">
                    <div class="bg-warning d-flex align-items-center justify-content-center rounded-circle mr-3"
                         style="width:44px;height:44px;min-width:44px;">
                        <i class="fas fa-key text-dark"></i>
                    </div>
                    <div>
                        <h5 class="modal-title text-white font-weight-bold mb-0" id="resetPwModalLabel">
                            Reset Password
                        </h5>
                        <small class="text-white-50">untuk akun: <strong id="reset-username-label" class="text-warning"></strong></small>
                    </div>
                </div>
                <button type="button" class="close text-white ml-auto" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body p-4">
                <div class="alert alert-warning small rounded-lg mb-4">
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    <strong>Perhatian:</strong> Tindakan ini akan langsung mengubah password user tanpa konfirmasi email. Pastikan Anda sudah memberitahu password baru kepada user bersangkutan.
                </div>

                <form id="resetPwForm" method="post" action="">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                           value="<?= Yii::$app->request->csrfToken ?>">

                    <div class="form-group mb-4">
                        <label class="font-weight-bold small text-uppercase text-muted">
                            <i class="fas fa-lock-open mr-1"></i> Password Baru
                        </label>
                        <input type="password" name="new_password" id="admin-new-password"
                               class="form-control rounded-lg py-3"
                               placeholder="Minimal 8 karakter" required minlength="8"
                               autocomplete="new-password">
                    </div>

                    <div class="form-group mb-0">
                        <label class="font-weight-bold small text-uppercase text-muted">
                            <i class="fas fa-check-double mr-1"></i> Konfirmasi Password
                        </label>
                        <input type="password" name="confirm_password" id="admin-confirm-password"
                               class="form-control rounded-lg py-3"
                               placeholder="Ulangi password baru" required autocomplete="new-password">
                        <small id="pw-match-msg" class="mt-1 d-block"></small>
                    </div>
                </form>
            </div>

            <div class="modal-footer border-0 pt-0 px-4 pb-4">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
                <button type="button" id="btn-submit-reset" class="btn btn-warning rounded-pill px-5 font-weight-bold shadow-sm">
                    <i class="fas fa-save mr-1"></i> Simpan Password Baru
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Isi modal berdasarkan tombol yang diklik
document.querySelectorAll('.btn-reset-pw').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var userId   = this.getAttribute('data-id');
        var username = this.getAttribute('data-username');
        var action   = '/admin/user/admin-reset-password?id=' + userId;

        document.getElementById('resetPwModalLabel').textContent = 'Reset Password';
        document.getElementById('reset-username-label').textContent = username;
        document.getElementById('resetPwForm').action = action;

        // Clear fields
        document.getElementById('admin-new-password').value = '';
        document.getElementById('admin-confirm-password').value = '';
        document.getElementById('pw-match-msg').textContent = '';
    });
});

// Live password match check
document.getElementById('admin-confirm-password').addEventListener('input', function() {
    var pw1 = document.getElementById('admin-new-password').value;
    var pw2 = this.value;
    var msg = document.getElementById('pw-match-msg');
    if (pw2.length === 0) {
        msg.textContent = '';
    } else if (pw1 === pw2) {
        msg.innerHTML = '<span class="text-success"><i class="fas fa-check mr-1"></i>Password cocok</span>';
    } else {
        msg.innerHTML = '<span class="text-danger"><i class="fas fa-times mr-1"></i>Password tidak cocok</span>';
    }
});

// Submit form via tombol modal
document.getElementById('btn-submit-reset').addEventListener('click', function() {
    var pw1 = document.getElementById('admin-new-password').value;
    var pw2 = document.getElementById('admin-confirm-password').value;
    if (pw1.length < 8) {
        alert('Password minimal 8 karakter!');
        return;
    }
    if (pw1 !== pw2) {
        alert('Password tidak cocok!');
        return;
    }
    document.getElementById('resetPwForm').submit();
});
</script>

