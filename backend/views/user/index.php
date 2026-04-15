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
