<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Page $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="page-form p-3">

    <?php $form = ActiveForm::begin(['id' => 'page-form-ajax']); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Judul Halaman...']) ?>
            <?= $form->field($model, 'content')->textarea(['rows' => 15, 'class' => 'form-control summernote']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true, 'placeholder' => 'slug-halaman-otomatis']) ?>
            
            <div class="alert alert-info py-2 small">
                <i class="fas fa-info-circle mr-1"></i> Slug digunakan untuk URL cantik halaman.
            </div>

            <div class="card bg-light border-0 shadow-none mt-4">
                <div class="card-body">
                    <p class="text-muted small mb-0">Klik tombol di bawah untuk menyimpan perubahan.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer px-0 pb-0 pt-3 mt-4">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fas fa-save me-1"></i> Publikasikan Halaman' : '<i class="fas fa-check me-1"></i> Perbarui Halaman', ['class' => 'btn btn-secondary btn-block shadow-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$('#page-form-ajax').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    $.post(form.attr('action'), form.serialize(), function(response) {
        if (response.success) {
            $('#modal').modal('hide');
            $.pjax.reload({container: '#pjax-container'});
            if(typeof toastr !== "undefined") toastr.success(response.message);
            else alert(response.message);
        }
    });
});

// Auto slug generation script
$('#page-title').on('keyup', function() {
    var title = $(this).val();
    var slug = title.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    $('#page-slug').val(slug);
});
JS;
$this->registerJs($js);
?>
