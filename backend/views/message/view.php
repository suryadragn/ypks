<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\ContactMessage $model */

$this->title = 'Pesan: ' . $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Inbox', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-message-view container-fluid p-4">

    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card card-outline card-primary shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="card-title font-weight-bold">
                                <i class="fas fa-envelope-open mr-2 text-primary"></i> Detail Pesan
                            </h3>
                        </div>
                        <div class="col-6 text-right">
                            <a href="<?= Url::to(['index']) ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Inbox
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <div class="message-header mb-4 border-bottom pb-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="font-weight-bold mb-1 text-dark"><?= Html::encode($model->subject) ?></h4>
                                <p class="mb-0 text-muted">
                                    <span class="text-primary font-weight-bold"><i class="fas fa-user mr-1"></i> <?= Html::encode($model->name) ?></span> 
                                    <span class="mx-2 text-light">|</span>
                                    <span class="font-italic"><i class="fas fa-envelope mr-1"></i> <?= Html::encode($model->email) ?></span>
                                </p>
                            </div>
                            <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                                <div class="badge badge-light p-2 font-weight-normal text-muted">
                                    <i class="far fa-clock mr-1 text-primary"></i> <?= date('d M Y, H:i', $model->created_at) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="message-body p-4 bg-light rounded-4 text-muted" style="line-height: 1.8; min-height: 200px; font-size: 1.1rem;">
                        <?= nl2br(Html::encode($model->body)) ?>
                    </div>
                </div>

                <div class="card-footer bg-white py-3 px-4 border-top">
                    <?= Html::a('<i class="fas fa-trash-alt mr-1"></i> Hapus Pesan', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-outline-danger btn-sm rounded-pill px-4',
                        'data' => [
                            'confirm' => 'Hapus pesan ini secara permanen?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <a href="mailto:<?= Html::encode($model->email) ?>?subject=Re: <?= Html::encode($model->subject) ?>" class="btn btn-primary btn-sm rounded-pill px-4 float-right">
                        <i class="fas fa-reply mr-1"></i> Balas via Email
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .rounded-4 { border-radius: 12px; }
    .bg-light { background-color: #f8f9fa !important; border: 1px solid #e9ecef; }
    .text-dark { color: #2d3436 !important; }
</style>
