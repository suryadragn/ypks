<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DonationAccount $model */

$this->title = 'Tambah Rekening Donasi';
$this->params['breadcrumbs'][] = ['label' => 'Manajemen Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-account-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
