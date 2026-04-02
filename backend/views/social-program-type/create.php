<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SocialProgramType $model */

$this->title = 'Tambah Referensi Program';
$this->params['breadcrumbs'][] = ['label' => 'Referensi Jenis Program', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-program-type-create p-3">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
