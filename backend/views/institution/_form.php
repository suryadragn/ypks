<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Tabs;

/** @var yii\web\View $this */
/** @var common\models\Institution $model */
/** @var common\models\InstitutionProfile $profile */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="institution-form p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'institution-form-ajax',
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= Tabs::widget([
        'items' => [
            [
                'label' => '<i class="fas fa-info-circle mr-1"></i> Data Utama',
                'encode' => false,
                'content' => $this->render('_form_main', ['form' => $form, 'model' => $model]),
                'active' => true
            ],
            [
                'label' => '<i class="fas fa-file-alt mr-1"></i> Profil Lengkap',
                'encode' => false,
                'content' => $this->render('_form_profile', ['form' => $form, 'profile' => $profile]),
            ],
        ],
        'navType' => 'nav-tabs card-header-tabs',
        'renderTabContent' => true,
    ]) ?>

    <div class="modal-footer px-0 pb-0 pt-3 mt-3">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fas fa-save me-1"></i> Simpan Lembaga' : '<i class="fas fa-check me-1"></i> Simpan Perubahan', ['class' => 'btn btn-primary d-block w-100 shadow-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$(document).off('beforeSubmit', '#institution-form-ajax').on('beforeSubmit', '#institution-form-ajax', function(e) {
    var form = $(this);
    var formData = new FormData(form[0]);

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
            } else {
                // handle validation errors if returned in JSON
                alert(response.message || 'Gagal menyimpan data.');
            }
        },
        error: function(xhr) {
            var errorMsg = 'Terjadi kesalahan pada server.';
            if (xhr.responseJSON && xhr.responseJSON.message) errorMsg = xhr.responseJSON.message;
            alert(errorMsg);
            console.error(xhr.responseText);
        }
    });
    return false;
});

// Prevent default submit just in case
$(document).off('submit', '#institution-form-ajax').on('submit', '#institution-form-ajax', function(e) {
    e.preventDefault();
});

$('#institution-logo').on('change', function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#logo-preview').html('<img src="'+e.target.result+'" class="img-fluid rounded border p-1 bg-white" style="max-height: 120px">');
        }
        reader.readAsDataURL(input.files[0]);
    }
});
JS;
$this->registerJs($js);
?>