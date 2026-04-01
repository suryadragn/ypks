<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = 'Atur Hak Akses: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update container-fluid p-4">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-outline card-primary shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-white py-3">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-key mr-2 text-primary"></i> Pengaturan Izin User
                    </h3>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <div class="user-profile mb-5 border-bottom pb-4 d-flex align-items-center">
                        <div class="bg-primary-soft p-4 rounded-circle mr-4 text-primary">
                             <i class="fas fa-user-circle display-4"></i>
                        </div>
                        <div>
                            <h4 class="font-weight-bold mb-1 text-dark text-uppercase ls-1"><?= Html::encode($model->username) ?></h4>
                            <p class="mb-0 text-muted italic">ID: #<?= $model->id ?> | <?= Html::encode($model->email) ?></p>
                        </div>
                    </div>

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="permissions-form mb-5">
                        <h6 class="text-uppercase font-weight-bold text-muted small ls-2 mb-4">MODUL YANG BOLEH DIAKSES:</h6>
                        
                        <?= $form->field($model, 'permission_ids')->checkboxList(\common\models\User::getPermissionsList(), [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $isChecked = $checked ? 'checked' : '';
                                return '<div class="custom-control custom-checkbox custom-checkbox-lg py-2 mb-2 d-flex align-items-center border rounded px-3 transition-bg-hover">
                                            <input type="checkbox" class="custom-control-input" id="perm_'.$index.'" name="'.$name.'" value="'.$value.'" '.$isChecked.'>
                                            <label class="custom-control-label fw-bold ml-3 w-100" for="perm_'.$index.'">'.$label.'</label>
                                        </div>';
                            },
                        ])->label(false) ?>
                    </div>

                    <?php if (Yii::$app->user->id != $model->id || $model->is_superadmin): ?>
                        <div class="role-form mb-5 p-4 bg-light rounded-4">
                             <h6 class="text-uppercase font-weight-bold text-danger small ls-2 mb-4">OPSI LANJUTAN:</h6>
                             <?= $form->field($model, 'is_superadmin')->checkbox(['class' => 'custom-control-input', 'id' => 'is_superadmin'])->label('Jadikan Superadmin (Akses Penuh)', ['class' => 'font-weight-bold text-uppercase small text-danger']) ?>
                             <p class="small text-muted mt-2 italic px-4">Peringatan: Superadmin memiliki hak untuk menambah, mengedit, dan menghapus staf lain termasuk Anda.</p>
                        </div>
                    <?php endif; ?>

                    <div class="form-group text-right border-top pt-4 mt-5">
                        <?= Html::a('<i class="fas fa-times"></i> Batal', ['index'], ['class' => 'btn btn-outline-secondary rounded-pill px-4 mr-2']) ?>
                        <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan Perubahan', ['class' => 'btn btn-primary rounded-pill px-5 shadow-sm font-weight-bold']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .bg-primary-soft { background-color: rgba(0, 123, 255, 0.1); }
    .ls-2 { letter-spacing: 2px; }
    .ls-1 { letter-spacing: 1px; }
    .transition-bg-hover:hover { background-color: #f8f9fa; cursor: pointer; }
    .custom-checkbox-lg .custom-control-label::before, 
    .custom-checkbox-lg .custom-control-label::after {
        width: 1.5rem; height: 1.5rem; left: -1.5rem;
    }
    .custom-checkbox-lg .custom-control-label { padding-left: 0.5rem; font-size: 1.1rem; }
</style>
