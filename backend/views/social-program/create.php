<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SocialProgram $model */

$this->title = 'Tambah Program Baru';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Program Sosial', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-program-create p-3">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
