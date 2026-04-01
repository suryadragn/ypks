<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Kontak Kami';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact py-5 mt-4">
    <div class="container rounded-4 shadow-lg bg-white p-0 overflow-hidden">
        <div class="row g-0">
            <!-- Info Side -->
            <div class="col-lg-5 bg-primary text-white p-5 d-flex flex-column justify-content-between">
                <div>
                    <h2 class="display-6 fw-bold mb-4">Hubungi Kami</h2>
                    <p class="mb-5 opacity-75">Kami siap melayani Anda. Silakan isi formulir atau hubungi kami melalui rincian kontak di bawah ini.</p>
                    
                    <div class="contact-details d-flex flex-column gap-4">
                        <div class="d-flex align-items-center gap-4 py-2">
                            <div class="fs-4 bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <small class="d-block text-uppercase opacity-75 fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Kantor Pusat</small>
                                <span class="fw-medium">Jl. Lawu No.115 Karanganyar</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4 py-2">
                            <div class="fs-4 bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <small class="d-block text-uppercase opacity-75 fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Telepon/Fax</small>
                                <span class="fw-medium">(0271) 495212</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-4 py-2">
                            <div class="fs-4 bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <small class="d-block text-uppercase opacity-75 fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Email Resmi</small>
                                <span class="fw-medium">info@yapendikra.or.id</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="social-links mt-5 pt-4 d-flex gap-3">
                    <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center hover-scale" style="width: 45px; height: 45px; color: #1877F2;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center hover-scale" style="width: 45px; height: 45px; color: #E4405F;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-light rounded-circle shadow-sm d-flex align-items-center justify-content-center hover-scale" style="width: 45px; height: 45px; color: #CD201F;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Form Side -->
            <div class="col-lg-7 p-5 bg-white">
                <h3 class="fw-bold mb-4">Kirim Pesan</h3>
                
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Nama Lengkap', 'class' => 'form-control py-3 border-light-subtle rounded-3 shadow-none bg-light'])->label(false) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Alamat Email', 'class' => 'form-control py-3 border-light-subtle rounded-3 shadow-none bg-light'])->label(false) ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subjek Pesan', 'class' => 'form-control py-3 border-light-subtle rounded-3 shadow-none bg-light'])->label(false) ?>
                    </div>

                    <div class="mb-4">
                        <?= $form->field($model, 'body')->textarea(['rows' => 4, 'placeholder' => 'Isi pesan Anda di sini...', 'class' => 'form-control py-3 border-light-subtle rounded-3 shadow-none bg-light'])->label(false) ?>
                    </div>

                    <div class="mb-4 captcha-box">
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                            'template' => '<div class="row align-items-center"><div class="col-4">{image}</div><div class="col-8">{input}</div></div>',
                            'options' => ['class' => 'form-control py-3 border-light-subtle rounded-3 shadow-none bg-light', 'placeholder' => 'Kode Verifikasi']
                        ])->label(false) ?>
                    </div>

                    <div class="form-group mb-0">
                        <?= Html::submitButton('Kirim Sekarang', ['class' => 'btn btn-primary btn-lg w-100 rounded-3 fw-bold py-3 shadow-lg transition-all', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<style>
.site-contact {
    background-color: transparent !important;
}

.captcha-box img {
    border-radius: 8px;
    height: 50px !important;
}

.transition-all {
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
}

.form-control:focus {
    background-color: #fff !important;
    border-color: #2563eb !important;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1) !important;
}
</style>
