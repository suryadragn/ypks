<?php
use yii\helpers\Html;
?>
<div class="p-3 border border-top-0 rounded-bottom bg-white">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-9">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Nama Lembaga...']) ?>
                </div>
                <div class="col-md-3">
                    <label class="d-block">&nbsp;</label>
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success pt-1">
                        <input type="checkbox" class="custom-control-input" id="is_active_toggle" name="Institution[is_active]" value="1" <?= $model->is_active ? 'checked' : '' ?>>
                        <input type="hidden" name="Institution[is_active]" value="0">
                        <label class="custom-control-label font-weight-bold" for="is_active_toggle">Aktif</label>
                    </div>
                </div>
            </div>
            <?= $form->field($model, 'description')->textarea(['rows' => 8, 'placeholder' => 'Deskripsi Profil Lembaga...']) ?>
            <?= $form->field($model, 'external_link')->textInput(['maxlength' => true, 'placeholder' => 'Link Website (Opsional)...']) ?>
        </div>
        <div class="col-md-4">
            <div class="card bg-light border-0 shadow-none mb-3">
                <div class="card-body p-3">
                    <label class="control-label">Logo Lembaga</label>
                    <?= $form->field($model, 'logo')->fileInput(['class' => 'form-control-file'])->label(false) ?>
                    <div id="logo-preview" class="mt-2 text-center">
                        <?php if ($model->logo): ?>
                            <img src="<?= Yii::getAlias('@web/../../uploads/institution/') . $model->logo ?>" class="img-fluid rounded border p-1 bg-white" style="max-height: 120px">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="alert alert-warning py-2 small">
                <i class="fas fa-exclamation-triangle mr-1"></i> Gunakan gambar dengan latar belakang transparan (PNG) untuk hasil terbaik.
            </div>
        </div>
    </div>
</div>
