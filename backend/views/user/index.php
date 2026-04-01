<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manajemen User & Hak Akses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index container-fluid p-4">

    <div class="card card-outline card-primary shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3">
            <h3 class="card-title font-weight-bold">
                <i class="fas fa-users-cog mr-2 text-primary"></i> <?= Html::encode($this->title) ?>
            </h3>
        </div>
        
        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'tableOptions' => ['class' => 'table table-hover mb-0'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'contentOptions' => ['style' => 'width: 50px']],
                    [
                        'attribute' => 'username',
                        'label' => 'Nama User',
                        'value' => function($model) {
                            $badge = $model->is_superadmin 
                                ? ' <span class="badge badge-danger">SUPERADMIN</span>' 
                                : ' <span class="badge badge-info">STAF</span>';
                            return "<strong>$model->username</strong>" . $badge . "<br><small class='text-muted'>$model->email</small>";
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'permission_ids',
                        'label' => 'Hak Akses Modul',
                        'value' => function($model) {
                            if ($model->is_superadmin) {
                                return '<span class="text-success fw-bold"><i class="fas fa-check-double mr-1"></i> AKSES PENUH</span>';
                            }
                            
                            $perms = $model->masterPermissions;
                            if (empty($perms)) {
                                return '<span class="text-muted italic">Tidak ada akses khusus</span>';
                            }
                            
                            $tags = [];
                            foreach ($perms as $p) {
                                $tags[] = '<span class="badge badge-outline-primary border-primary text-primary px-2 py-1 mr-1 mb-1">' . $p->name . '</span>';
                            }
                            return implode('', $tags);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'status',
                        'label' => 'Status Akun',
                        'value' => function($model) {
                            return $model->status === 10 
                                ? '<span class="text-success"><i class="fas fa-check-circle mr-1"></i> Aktif</span>' 
                                : '<span class="text-warning"><i class="fas fa-hourglass-half mr-1"></i> Non-Aktif</span>';
                        },
                        'format' => 'raw',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::a('<i class="fas fa-edit"></i> Atur Akses', $url, [
                                    'class' => 'btn btn-xs btn-outline-primary rounded-pill px-2',
                                ]);
                            },
                        ],
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width: 150px'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<style>
    .badge-outline-primary {
        background-color: transparent;
        border: 1px solid #007bff;
        color: #007bff;
    }
</style>
