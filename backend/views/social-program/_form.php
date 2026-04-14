<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\SocialProgramType;

/** @var yii\web\View $this */
/** @var common\models\SocialProgram $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="social-program-form p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'social-program-form-ajax',
        'action' => $model->isNewRecord ? \yii\helpers\Url::to(['social-program/create']) : \yii\helpers\Url::to(['social-program/update', 'id' => $model->id]),
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'type_id')->dropDownList(
                        ArrayHelper::map(SocialProgramType::find()->all(), 'id', 'name'),
                        ['prompt' => '-- Pilih Jenis Program --']
                    ) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'donation_account_id')->dropDownList(
                        ArrayHelper::map(\common\models\DonationAccount::find()->where(['is_active' => 1])->all(), 'id', function($acc) {
                            return $acc->bank_name . ' (' . $acc->account_number . ')';
                        }),
                        ['prompt' => '-- Pilih Rekening Donasi --']
                    ) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'summary')->textarea(['rows' => 2, 'placeholder' => 'Ringkasan singkat untuk tampilan kartu program.']) ?>
            
            <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3 border-0 shadow-sm">
                <?= $form->field($model, 'target_amount')->textInput(['type' => 'number', 'step' => '0.01']) ?>
                <?= $form->field($model, 'current_amount')->textInput(['type' => 'number', 'step' => '0.01']) ?>
                
                <div class="row g-3">
                    <div class="col-6 shadow-none border-0 pt-0">
                        <label class="d-block mb-3 font-weight-bold"><i class="fas fa-toggle-on mr-1 text-primary"></i> Status Program</label>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success pt-1">
                            <input type="hidden" name="SocialProgram[status]" value="0">
                            <input type="checkbox" class="custom-control-input" id="status_toggle" name="SocialProgram[status]" value="1" <?= $model->status ? 'checked' : '' ?>>
                            <label class="custom-control-label font-weight-bold" for="status_toggle">Buka</label>
                        </div>
                    </div>
                    <div class="col-6 shadow-none border-0 pt-0">
                        <label class="d-block mb-3 font-weight-bold"><i class="fas fa-star mr-1 text-warning"></i> Unggulan?</label>
                        <div class="custom-control custom-switch custom-switch-off-secondary custom-switch-on-warning pt-1">
                            <input type="hidden" name="SocialProgram[is_featured]" value="0">
                            <input type="checkbox" class="custom-control-input" id="is_featured_toggle" name="SocialProgram[is_featured]" value="1" <?= $model->is_featured ? 'checked' : '' ?>>
                            <label class="custom-control-label font-weight-bold" for="is_featured_toggle">Featured</label>
                        </div>
                    </div>
                </div>

                <hr>
                
                <?php if ($model->image): ?>
                    <div class="mb-2 text-center" id="image-preview">
                        <label class="d-block text-left font-weight-bold"><i class="fas fa-image mr-1"></i> Gambar Saat Ini:</label>
                        <?= Html::img(Yii::getAlias('@web/../../uploads/programs/') . $model->image, ['class' => 'img-fluid rounded shadow-sm border p-1 bg-white', 'style' => 'max-height: 120px;']) ?>
                    </div>
                <?php else: ?>
                    <div class="mb-2 text-center" id="image-preview"></div>
                <?php endif; ?>
                
                <?= $form->field($model, 'image')->fileInput(['class' => 'form-control-file', 'id' => 'program-image']) ?>
                <small class="text-muted">Rasio ideal 4:3 atau 16:9.</small>
            </div>
        </div>
    </div>

    <div class="modal-footer px-0 pb-0 pt-3 mt-3">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fas fa-save me-1"></i> Simpan Program' : '<i class="fas fa-check me-1"></i> Simpan Perubahan', ['class' => 'btn btn-primary d-block w-100 shadow-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$('#social-program-form-ajax').off('submit').on('submit', function(e) {
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

$('#program-image').on('change', function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').html('<img src="'+e.target.result+'" class="img-fluid rounded border p-1 bg-white" style="max-height: 120px">');
        }
        reader.readAsDataURL(input.files[0]);
    }
});
JS;
$this->registerJs($js);
?>
