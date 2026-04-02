<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\SocialProgramType $model */

$this->title = 'Edit Referensi: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Referensi Jenis Program', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="social-program-type-update p-3">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
