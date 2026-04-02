<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DonationAccount $model */

$this->title = 'Edit Rekening: ' . $model->bank_name;
$this->params['breadcrumbs'][] = ['label' => 'Manajemen Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="donation-account-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
