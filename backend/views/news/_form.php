<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="news-form p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'news-form-ajax',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Ketik judul berita...']) ?>
            <?= $form->field($model, 'content')->textarea(['rows' => 10, 'class' => 'form-control summernote']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'category')->dropDownList([
                'Pendidikan' => 'Pendidikan',
                'Kegiatan' => 'Kegiatan',
                'Pengumuman' => 'Pengumuman',
                'Prestasi' => 'Prestasi',
            ], ['prompt' => '-- Pilih Kategori --']) ?>

            <?= $form->field($model, 'author')->textInput(['maxlength' => true, 'value' => $model->isNewRecord ? Yii::$app->user->identity->username : $model->author]) ?>

            <?= $form->field($model, 'publish_date')->input('date') ?>

            <div class="card bg-light border-0 shadow-none mb-3">
                <div class="card-body p-3">
                    <label class="control-label">Gambar Berita</label>
                    <?= $form->field($model, 'image')->fileInput(['class' => 'form-control-file'])->label(false) ?>
                    <div id="image-preview" class="mt-2 text-center">
                        <?php if ($model->image): ?>
                            <img src="<?= Yii::getAlias('@web/../../public/uploads/news/') . $model->image ?>" class="img-fluid rounded border" style="max-height: 150px">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'status')->dropDownList([
                10 => 'Terbit (Active)',
                9 => 'Draf (Inactive)',
            ]) ?>
        </div>
    </div>

    <div class="modal-footer px-0 pb-0 pt-3">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fas fa-save me-1"></i> Simpan Berita' : '<i class="fas fa-check me-1"></i> Perbarui Berita', ['class' => 'btn btn-primary btn-block shadow-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$('#news-form-ajax').on('submit', function(e) {
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
                // We'll use alert if toastr is not loaded
                if(typeof toastr !== "undefined") {
                    toastr.success(response.message);
                } else {
                    alert(response.message);
                }
            } else {
                // Handle validation errors if any
                alert('Gagal menyimpan data. Periksa kembali inputan Anda.');
            }
        },
        error: function() {
            alert('Terjadi kesalahan pada server.');
        }
    });
});

// Image preview logic
$('#news-image').on('change', function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').html('<img src="'+e.target.result+'" class="img-fluid rounded border" style="max-height: 150px">');
        }
        reader.readAsDataURL(input.files[0]);
    }
});
JS;
$this->registerJs($js);
?>

<style>
.modal-footer {
    border-top: 1px solid #dee2e6;
}
</style>
