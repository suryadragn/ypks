<?php

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var common\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Manajemen Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-newspaper mr-2"></i> Daftar Berita</h3>
            <div class="card-tools">
                <?= Html::button('<i class="fas fa-plus"></i> Tambah Berita', [
                    'value' => Url::to(['create']),
                    'class' => 'btn btn-success btn-sm showModalButton',
                    'title' => 'Tambah Berita Baru'
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
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function($model) {
                            $url = $model->image ? Yii::getAlias('@web/../../public/uploads/news/') . $model->image : 'https://placehold.co/100x60?text=No+Image';
                            return Html::img($url, ['class' => 'img-thumbnail', 'style' => 'width:80px; height:50px; object-fit:cover;']);
                        },
                        'headerOptions' => ['style' => 'width:100px'],
                    ],
                    'title',
                    [
                        'attribute' => 'category',
                        'value' => function($model) {
                            return '<span class="badge badge-info">' . ($model->category ?: 'General') . '</span>';
                        },
                        'format' => 'raw',
                    ],
                    'author',
                    [
                        'attribute' => 'publish_date',
                        'format' => ['date', 'php:d M Y'],
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'header' => 'Aksi',
                        'headerOptions' => ['style' => 'width:150px'],
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::button('<i class="fas fa-edit"></i>', [
                                    'value' => $url,
                                    'class' => 'btn btn-primary btn-xs showModalButton',
                                    'title' => 'Edit Berita',
                                    'data-toggle' => 'tooltip'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-danger btn-xs btn-delete-ajax',
                                    'title' => 'Hapus Berita',
                                    'data-confirm' => 'Apakah Anda yakin ingin menghapus berita ini?',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
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
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'title' => '<h4 class="modal-title">Form Berita</h4>',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>',
]);
echo "<div id='modalContent'><div class='text-center p-5'><i class='fas fa-spinner fa-spin fa-3x text-muted'></i></div></div>";
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

// Pemicu Paksa Tutup Modal (Jika data-dismiss gagal)
$(document).on('click', '[data-dismiss="modal"]', function() {
    $(this).closest('.modal').modal('hide');
});

// Handle generic AJAX delete
$(document).on('click', '.btn-delete-ajax', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    if (confirm('Yakin ingin menghapus data ini?')) {
        $.post(url, function(data) {
            if (data.success) {
                $.pjax.reload({container: '#pjax-container'});
                toastr.success(data.message);
            }
        });
    }
});

// Tooltip helper
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
JS;
$this->registerJs($js);
?>

<style>
.table thead th {
    border-top: none;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #6c757d;
}
.img-thumbnail {
    padding: 2px;
    border-radius: 6px;
}
</style>
