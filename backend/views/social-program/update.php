<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SocialProgram $model */

$this->title = 'Edit Program: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Program Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="social-program-update p-3">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
