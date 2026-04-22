<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\FoundationConfig $model */

$this->title = 'Update Profil: ' . $model->version_name;
$this->params['breadcrumbs'][] = ['label' => 'Profil Yayasan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foundation-config-update">

    <div class="mb-4 d-flex align-items-center">
        <?= Html::a('<i class="fas fa-arrow-left"></i>', ['index'], ['class' => 'btn btn-outline-secondary rounded-circle mr-3']) ?>
        <h2 class="font-weight-bold mb-0"><?= Html::encode($this->title) ?></h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
