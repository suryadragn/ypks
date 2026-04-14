<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SocialProgramType $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="social-program-type-form p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'social-program-type-form-ajax',
        'action' => $model->isNewRecord ? \yii\helpers\Url::to(['social-program-type/create']) : \yii\helpers\Url::to(['social-program-type/update', 'id' => $model->id]),
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: Dana Bantuan Sosial']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'icon')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: fas fa-hand-holding-heart']) ?>
            <small class="text-muted">Gunakan class FontAwesome 5.</small>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <div class="modal-footer px-0 pb-0 pt-3 mt-3">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fas fa-save me-1"></i> Simpan Data' : '<i class="fas fa-check me-1"></i> Simpan Perubahan', ['class' => 'btn btn-primary d-block w-100 shadow-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$('#social-program-type-form-ajax').off('submit').on('submit', function(e) {
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
JS;
$this->registerJs($js);
?>
