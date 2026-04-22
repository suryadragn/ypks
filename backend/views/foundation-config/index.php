<?php

use common\models\FoundationConfig;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profil Yayasan (Referensi)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foundation-config-index">

    <div class="card card-outline card-primary shadow-sm rounded-lg">
        <div class="card-header bg-white py-3">
            <h3 class="card-title font-weight-bold text-uppercase">
                <i class="fas fa-landmark mr-2 text-primary"></i> <?= Html::encode($this->title) ?>
            </h3>
            <div class="card-tools">
                <?= Html::a('<i class="fas fa-plus mr-1"></i> Buat Versi Baru', ['create'], ['class' => 'btn btn-success btn-sm rounded-pill px-3 shadow-sm']) ?>
            </div>
        </div>
        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'tableOptions' => ['class' => 'table table-hover table-striped mb-0'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'version_name',
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function ($model) {
                            if ($model->is_active) {
                                return '<span class="badge badge-success px-3 py-2 rounded-pill shadow-xs"><i class="fas fa-check-circle mr-1"></i> AKTIF</span>';
                            }
                            return Html::a('<i class="fas fa-power-off mr-1"></i> Aktifkan', ['activate', 'id' => $model->id], [
                                'class' => 'btn btn-outline-primary btn-xs rounded-pill px-3',
                                'data-method' => 'post',
                                'data-confirm' => 'Aktifkan versi ini dan menonaktifkan versi lainnya?'
                            ]);
                        }
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => 'datetime',
                        'headerOptions' => ['class' => 'text-muted small text-uppercase'],
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::a('<i class="fas fa-edit"></i>', $url, [
                                    'class' => 'btn btn-info btn-xs rounded-circle',
                                    'title' => 'Edit Data'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                if ($model->is_active) return '';
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-danger btn-xs rounded-circle',
                                    'data-method' => 'post',
                                    'data-confirm' => 'Yakin ingin menghapus versi ini?',
                                    'title' => 'Hapus'
                                ]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
