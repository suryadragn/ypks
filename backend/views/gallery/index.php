<?php

use common\models\Gallery;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;

$this->title = 'Manajemen Galeri';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
    <div class="card card-outline card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-images mr-2"></i> Foto Galeri</h3>
            <div class="card-tools">
                <?= Html::button('<i class="fas fa-plus"></i> Tambah Foto', [
                    'value' => Url::to(['create']),
                    'class' => 'btn btn-success btn-sm showModalButton',
                    'title' => 'Unggah Foto Baru'
                ]) ?>
            </div>
        </div>
        <div class="card-body p-0">
            <?php Pjax::begin(['id' => 'pjax-container']); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-hover mb-0'],
                'layout' => "{items}\n<div class='p-3 d-flex justify-content-between align-items-center'>{summary}{pager}</div>",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'image',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $url = 'https://placehold.co/100x60?text=No+Image';
                            if ($model->image) {
                                if (strpos($model->image, 'http') === 0) {
                                    $url = $model->image;
                                } else {
                                    $url = Yii::getAlias('@web/../../uploads/gallery/') . $model->image;
                                }
                            }
                            return Html::img($url, ['class' => 'img-thumbnail', 'style' => 'width:100px; height:60px; object-fit:cover;']);
                        },
                    ],
                    'title',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return Html::button('<i class="fas fa-edit"></i>', [
                                    'value' => $url,
                                    'class' => 'btn btn-primary btn-xs showModalButton',
                                    'title' => 'Edit Foto'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-danger btn-xs btn-delete-ajax',
                                    'data-confirm' => 'Hapus foto ini?',
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
    'size' => 'modal-md',
    'title' => '<h4 class="modal-title">Form Galeri</h4>',
]);
echo "<div id='modalContent'><div class='text-center p-4'><i class='fas fa-spinner fa-spin fa-2x text-muted'></i></div></div>";
Modal::end();
?>

<?php
$js = <<<JS
$(document).on('click', '.showModalButton', function() {
    $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    $('#modal').find('.modal-title').html($(this).attr('title'));
});

$(document).on('click', '.btn-delete-ajax', function(e) {
    e.preventDefault();
    if (confirm($(this).data('confirm'))) {
        $.post($(this).attr('href'), function(data) {
            if (data.success) {
                $.pjax.reload({container: '#pjax-container'});
            }
        });
    }
});
JS;
$this->registerJs($js);
?>