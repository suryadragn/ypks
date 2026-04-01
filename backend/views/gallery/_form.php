<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Gallery $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="gallery-form p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'gallery-form-ajax',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Ketik judul foto...']) ?>
    
    <div class="card bg-light border-0 shadow-none mb-3">
        <div class="card-body p-3">
            <label class="control-label">Pilih Foto</label>
            <?= $form->field($model, 'image')->fileInput(['class' => 'form-control-file'])->label(false) ?>
            <div id="image-gallery-preview" class="mt-2 text-center">
                <?php if ($model->image): ?>
                    <img src="<?= Yii::getAlias('@web/../../public/uploads/gallery/') . $model->image ?>" class="img-fluid rounded border" style="max-height: 150px">
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal-footer px-0 pb-0 pt-3">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fas fa-upload me-1"></i> Unggah Sekarang' : '<i class="fas fa-check me-1"></i> Perbarui Foto', ['class' => 'btn btn-success btn-block shadow-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$('#gallery-form-ajax').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    var formData = new FormData(this);

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success) {
                $('#modal').modal('hide');
                $.pjax.reload({container: '#pjax-container'});
                if(typeof toastr !== "undefined") toastr.success(response.message);
                else alert(response.message);
            }
        }
    });
});

$('#gallery-image').on('change', function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-gallery-preview').html('<img src="'+e.target.result+'" class="img-fluid rounded border" style="max-height: 150px">');
        }
        reader.readAsDataURL(input.files[0]);
    }
});
JS;
$this->registerJs($js);
?>
