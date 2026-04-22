<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\FoundationConfig $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="foundation-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary card-outline shadow-sm mb-4">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Informasi Visi & Misi</h3>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'version_name')->textInput(['placeholder' => 'Contoh: Versi 2024 / Versi Musyawarah...', 'maxlength' => true]) ?>
                    <?= $form->field($model, 'vision')->textarea(['rows' => 3, 'placeholder' => 'Tulis visi yayasan di sini...']) ?>
                    <?= $form->field($model, 'mission')->textarea(['rows' => 8, 'placeholder' => "Tulis misi di sini.\nGunakan enter untuk memisahkan antar poin misi."]) ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card card-info card-outline shadow-sm mb-4">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Identitas Yayasan</h3>
                </div>
                <div class="card-body">
                    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'postal_code')->textInput(['maxlength' => true]) ?>
                    
                    <hr>
                    <?= $form->field($model, 'is_active')->checkbox() ?>
                </div>
                <div class="card-footer bg-white border-0 text-right">
                    <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan Konfigurasi', ['class' => 'btn btn-primary btn-block rounded-pill shadow-sm']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
