<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DonationAccount $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="donation-account-form p-3">

    <?php $form = ActiveForm::begin([
        'id' => 'donation-account-form',
        'enableAjaxValidation' => false,
        'options' => ['class' => 'row g-3'],
    ]); ?>

    <div class="col-md-6 mb-3">
        <?= $form->field($model, 'bank_name', [
            'template' => '{label}<div class="input-group"><div class="input-group-prepend"><span class="input-group-text bg-white"><i class="fas fa-university text-primary"></i></span></div>{input}</div>{error}',
        ])->textInput(['maxlength' => true, 'placeholder' => 'Contoh: BSI (Bank Syariah Indonesia)', 'class' => 'form-control shadow-none']) ?>
    </div>

    <div class="col-md-6 mb-3">
        <?= $form->field($model, 'account_number', [
            'template' => '{label}<div class="input-group"><div class="input-group-prepend"><span class="input-group-text bg-white"><i class="fas fa-id-card text-primary"></i></span></div>{input}</div>{error}',
        ])->textInput(['maxlength' => true, 'placeholder' => '71234567xx', 'class' => 'form-control font-weight-bold shadow-none']) ?>
    </div>

    <div class="col-12 mb-3">
        <?= $form->field($model, 'account_holder')->textInput(['maxlength' => true, 'placeholder' => 'Atas Nama Yayasan...', 'class' => 'form-control shadow-none']) ?>
    </div>

    <div class="col-md-12">
        <hr class="my-4">
        <h6 class="text-uppercase fw-bold text-muted mb-4 ls-1">Informasi Kontak Konfirmasi (Admin WA)</h6>
    </div>

    <div class="col-md-6 mb-3">
        <?= $form->field($model, 'contact_name', [
            'template' => '{label}<div class="input-group"><div class="input-group-prepend"><span class="input-group-text bg-white"><i class="fas fa-user-tie text-muted"></i></span></div>{input}</div>{error}',
        ])->textInput(['maxlength' => true, 'placeholder' => 'Nama CS/Admin WA', 'class' => 'form-control shadow-none']) ?>
    </div>

    <div class="col-md-6 mb-3">
        <?= $form->field($model, 'contact_phone', [
            'template' => '{label}<div class="input-group"><div class="input-group-prepend"><span class="input-group-text bg-white"><i class="fab fa-whatsapp text-success fs-4"></i></span></div>{input}</div>{error}',
        ])->textInput(['maxlength' => true, 'placeholder' => '081234xxxx', 'class' => 'form-control shadow-none']) ?>
    </div>

    <div class="col-12 mb-3">
        <label class="d-block mb-2 font-weight-bold">Status Rekening</label>
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
            <input type="hidden" name="DonationAccount[is_active]" value="0">
            <input type="checkbox" class="custom-control-input" id="is_active_toggle" name="DonationAccount[is_active]" value="1" <?= $model->is_active ? 'checked' : '' ?>>
            <label class="custom-control-label font-weight-bold" for="is_active_toggle">Aktif (Rekening ini tampil di pilihan donasi program)</label>
        </div>
    </div>

    <div class="col-12 mb-3 border-top pt-4 text-right">
        <?= Html::submitButton('<i class="fas fa-save mr-2"></i> Simpan Rekening', [
            'class' => 'btn btn-primary rounded-pill px-4 shadow-primary fw-bold hover-lift'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
$('#donation-account-form').on('beforeSubmit', function(e) {
    var form = $(this);
    $.ajax({
        url: form.attr('action'),
        type: 'post',
        data: form.serialize(),
        success: function(data) {
            if (data.success) {
                $('#modal').modal('hide');
                $.pjax.reload({container: '#pjax-container'});
                if(typeof toastr !== "undefined") toastr.success(data.message);
            }
        }
    });
    return false;
});
JS;
$this->registerJs($js);
?>

<style>
.ls-1 { letter-spacing: 0.5px; }
.shadow-primary { box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4); }
.hover-lift { transition: transform 0.3s ease; }
.hover-lift:hover { transform: translateY(-3px); }
</style>
