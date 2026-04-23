<?php

use common\models\Institution;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;

$this->title = 'Daftar Lembaga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-index">
    <div class="card card-outline card-info shadow-sm">
        <div class="card-header">
            <h3 class="card-title text-uppercase fw-bold"><i class="fas fa-university mr-2"></i> Pengelolaan Lembaga</h3>
            <div class="card-tools">
                <?= Html::button('<i class="fas fa-plus"></i> Tambah Lembaga', [
                    'value' => Url::to(['create']),
                    'class' => 'btn btn-primary btn-sm showModalButton',
                    'title' => 'Tambah Lembaga Baru'
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
                        'attribute' => 'logo',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $url = 'https://placehold.co/100x60?text=No+Logo';
                            if ($model->logo) {
                                if (strpos($model->logo, 'http') === 0) {
                                    $url = $model->logo;
                                } else {
                                    $url = Yii::getAlias('@web/../../uploads/institution/') . $model->logo;
                                }
                            }
                            return Html::img($url, ['class' => 'img-thumbnail p-1 bg-white', 'style' => 'width:60px; height:60px; object-fit:contain;']);
                        },
                        'headerOptions' => ['style' => 'width:80px'],
                    ],
                    'name',
                    [
                        'attribute' => 'is_active',
                        'format' => 'raw',
                        'value' => function($model) {
                            return $model->is_active 
                                ? '<span class="badge badge-success px-3 rounded-pill">Aktif</span>' 
                                : '<span class="badge badge-danger px-3 rounded-pill">Non-Aktif</span>';
                        },
                        'headerOptions' => ['style' => 'width:100px'],
                    ],
                    [
                        'attribute' => 'description',
                        'value' => function ($model) {
                            return \yii\helpers\StringHelper::truncate($model->description, 100);
                        }
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
                                    'class' => 'btn btn-info btn-xs showModalButton',
                                    'title' => 'Edit Lembaga'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a('<i class="fas fa-trash"></i>', $url, [
                                    'class' => 'btn btn-danger btn-xs btn-delete-ajax',
                                    'data-confirm' => 'Hapus lembaga ini?',
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
    'title' => '<h4 class="modal-title">Lembaga</h4>',
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