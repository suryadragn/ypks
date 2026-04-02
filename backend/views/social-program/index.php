<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var common\models\SocialProgramSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Program Sosial';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-program-index card card-primary card-outline shadow-sm">
    <div class="card-header">
        <h3 class="card-title text-uppercase fw-bold"><i class="fas fa-hand-holding-heart mr-2"></i> <?= Html::encode($this->title) ?></h3>
        <div class="card-tools">
            <?= Html::button('<i class="fas fa-plus"></i> Tambah Program', [
                'value' => Url::to(['create']),
                'class' => 'btn btn-success btn-sm showModalButton',
                'title' => 'Tambah Program'
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
                    'value' => function($model) {
                        $url = $model->image ? Yii::getAlias('@web/../../public/uploads/programs/') . $model->image : 'https://placehold.co/100x60?text=No+Image';
                        return Html::img($url, ['class' => 'img-thumbnail', 'style' => 'width:80px; height:50px; object-fit:cover;']);
                    },
                    'headerOptions' => ['style' => 'width:100px'],
                ],
                [
                    'attribute' => 'type_id',
                    'filter' => \yii\helpers\ArrayHelper::map(\common\models\SocialProgramType::find()->all(), 'id', 'name'),
                    'value' => 'type.name'
                ],
                'title',
                [
                    'attribute' => 'target_amount',
                    'contentOptions' => ['class' => 'font-weight-bold text-primary'],
                    'value' => function($model) {
                        return 'Rp ' . number_format($model->target_amount, 0, ',', '.');
                    }
                ],
                [
                    'attribute' => 'status',
                    'filter' => [1 => 'Buka', 0 => 'Tutup'],
                    'format' => 'raw',
                    'value' => function($model) {
                        return $model->status ? '<span class="badge badge-success">Buka</span>' : '<span class="badge badge-danger">Tutup</span>';
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
                                'title' => 'Edit Program'
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="fas fa-trash"></i>', $url, [
                                'class' => 'btn btn-danger btn-xs btn-delete-ajax',
                                'data-confirm' => 'Hapus program ini?',
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
    'size' => 'modal-xl',
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
