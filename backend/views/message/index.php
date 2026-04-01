<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pesan Masuk (Inbox)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-message-index container-fluid p-4">
    
    <div class="card card-outline card-primary shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3">
            <h3 class="card-title font-weight-bold">
                <i class="fas fa-envelope-open-text mr-2 text-primary"></i> <?= Html::encode($this->title) ?>
            </h3>
        </div>
        
        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'tableOptions' => ['class' => 'table table-hover mb-0'],
                'rowOptions' => function($model) {
                    if (!$model->is_read) {
                        return ['class' => 'font-weight-bold bg-light-blue-50', 'style' => 'background-color: #f0f7ff;'];
                    }
                },
                'columns' => [
                    [
                        'attribute' => 'is_read',
                        'label' => '',
                        'format' => 'raw',
                        'value' => function($model) {
                            return $model->is_read 
                                ? '<i class="far fa-envelope-open text-muted"></i>' 
                                : '<i class="fas fa-envelope text-primary animate-pulse"></i>';
                        },
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width: 50px'],
                    ],
                    [
                        'attribute' => 'name',
                        'label' => 'Pengirim',
                        'value' => function($model) {
                            return $model->name . " <br><small class='text-muted'>$model->email</small>";
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'subject',
                        'label' => 'Subjek & Pesan',
                        'value' => function($model) {
                            $shortBody = \yii\helpers\StringHelper::truncate($model->body, 100);
                            return "<strong>$model->subject</strong><br><span class='small text-muted'>$shortBody</span>";
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Tanggal',
                        'value' => function($model) {
                            return date('d M Y, H:i', $model->created_at);
                        },
                        'headerOptions' => ['style' => 'width: 150px'],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fas fa-eye"></i> Baca', $url, [
                                    'class' => 'btn btn-xs btn-outline-primary rounded-pill px-2',
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-xs btn-outline-danger rounded-circle',
                                    'data' => [
                                        'confirm' => 'Hapus pesan ini?',
                                        'method' => 'post',
                                    ],
                                ]);
                            },
                        ],
                        'contentOptions' => ['class' => 'text-center', 'style' => 'width: 120px'],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<style>
    .bg-light-blue-50 { border-left: 4px solid #007bff; }
    .animate-pulse { animation: pulse 2s infinite; }
    @keyframes pulse {
        0% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.2); opacity: 0.7; }
        100% { transform: scale(1); opacity: 1; }
    }
</style>
