<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var common\models\DonationAccountSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manajemen Rekening Donasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-account-index">

    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <h3 class="card-title text-uppercase fw-bold"><i class="fas fa-credit-card mr-2 text-primary"></i> <?= Html::encode($this->title) ?></h3>
            <div class="card-tools">
                <?= Html::button('<i class="fas fa-plus"></i> Tambah Rekening', [
                    'value' => Url::to(['create']),
                    'class' => 'btn btn-success btn-sm showModalButton shadow-sm',
                    'title' => 'Tambah Rekening Baru'
                ]) ?>
            </div>
        </div>
        <div class="card-body p-0">
            <?php Pjax::begin(['id' => 'pjax-container']); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-hover table-striped mb-0'],
                'layout' => "{items}\n<div class='p-3 d-flex justify-content-between align-items-center'>{summary}{pager}</div>",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['style' => 'width:60px']],

                    [
                        'attribute' => 'bank_name',
                        'value' => function($model) {
                            return '<strong>' . Html::encode($model->bank_name) . '</strong>';
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'account_number',
                        'value' => function($model) {
                            return '<code class="h6 font-weight-bold text-dark">' . Html::encode($model->account_number) . '</code>';
                        },
                        'format' => 'raw',
                    ],
                    'account_holder',
                    [
                        'attribute' => 'contact_name',
                        'value' => function($model) {
                            return $model->contact_name ? $model->contact_name . '<br><small class="text-muted">' . $model->contact_phone . '</small>' : '-';
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'is_active',
                        'filter' => [1 => 'Aktif', 0 => 'Non-Aktif'],
                        'format' => 'raw',
                        'value' => function($model) {
                            return $model->is_active ? '<span class="badge badge-success px-2 py-1">Aktif</span>' : '<span class="badge badge-danger px-2 py-1">Non-Aktif</span>';
                        },
                        'headerOptions' => ['style' => 'width:120px'],
                    ],

                    [
                        'class' => ActionColumn::className(),
                        'header' => 'Aksi',
                        'headerOptions' => ['style' => 'width:120px'],
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::button('<i class="fas fa-edit"></i>', [
                                    'value' => $url,
                                    'class' => 'btn btn-primary btn-xs showModalButton shadow-sm',
                                    'title' => 'Edit Rekening',
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-danger btn-xs btn-delete-ajax shadow-sm',
                                    'data-confirm' => 'Hapus rekening ' . $model->bank_name . '?',
                                    'data-method' => 'post',
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?php
Modal::begin([
    'id' => 'modal',
    'size' => 'modal-lg',
    // Removed static title to prevent duplication with JS dynamic title
]);
echo "<div id='modalContent'><div class='text-center py-5'><i class='fas fa-spinner fa-spin fa-2x text-muted'></i></div></div>";
Modal::end();
?>

<?php
$js = <<<JS
// Function to show modal
$(document).on('click', '.showModalButton', function() {
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
    $('#modal').find('.modal-title').html($(this).attr('title'));
});

// Handle generic AJAX delete
$(document).on('click', '.btn-delete-ajax', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (confirm($(this).data('confirm'))) {
        $.post(url, function(data) {
            if (data.success) {
                $.pjax.reload({container: '#pjax-container'});
                if(typeof toastr !== "undefined") toastr.success(data.message);
            }
        });
    }
});
JS;
$this->registerJs($js);
?>

<style>
.table thead th { border-top: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; }
</style>
