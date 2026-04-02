<?php

use common\models\SocialProgramType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var common\models\SocialProgramTypeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Referensi Jenis Program';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-program-type-index card card-primary card-outline shadow-sm">
    <div class="card-header">
        <h3 class="card-title text-uppercase fw-bold"><i class="fas fa-list-alt mr-2"></i> <?= Html::encode($this->title) ?></h3>
        <div class="card-tools">
            <?= Html::button('<i class="fas fa-plus"></i> Tambah Referensi', [
                'value' => Url::to(['create']),
                'class' => 'btn btn-success btn-sm showModalButton',
                'title' => 'Tambah Referensi'
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

                'name',
                'description:ntext',
                [
                    'attribute' => 'icon',
                    'format' => 'raw',
                    'value' => function($model) {
                        return '<i class="' . $model->icon . '"></i> ' . $model->icon;
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
                                'title' => 'Edit Referensi'
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fas fa-trash"></i>', $url, [
                                'class' => 'btn btn-danger btn-xs btn-delete-ajax',
                                'data-confirm' => 'Hapus data ini?',
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

<?php
Modal::begin([
    'id' => 'modal',
    'size' => 'modal-lg',
    // Removed static title to prevent duplication with JS dynamic title
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
                if(typeof toastr !== "undefined") toastr.success(data.message);
            }
        });
    }
});
JS;
$this->registerJs($js);
?>
