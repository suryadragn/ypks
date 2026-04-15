<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 shadow-none">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Url::to(['site/index']) ?>" class="nav-link text-muted small">
                <i class="fas fa-home mr-1"></i> Dashboard
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown" role="button">
                <div class="bg-warning d-flex align-items-center justify-content-center rounded-circle mr-2"
                     style="width:30px;height:30px;min-width:30px;">
                    <i class="fas fa-user-shield text-white" style="font-size:0.75rem;"></i>
                </div>
                <span class="small font-weight-bold text-dark d-none d-md-inline">
                    <?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 rounded-lg py-2" style="min-width:200px;">
                <div class="px-4 py-2 border-bottom mb-1">
                    <div class="font-weight-bold text-dark small">
                        <?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username ?>
                    </div>
                    <div class="text-muted" style="font-size:0.75rem;">
                        <?= Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->email ?>
                    </div>
                </div>
                <a class="dropdown-item py-2" href="<?= Url::to(['user/change-password']) ?>">
                    <i class="fas fa-key mr-2 text-warning"></i> Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <?= Html::a(
                    '<i class="fas fa-sign-out-alt mr-2 text-danger"></i> Logout',
                    ['/site/logout'],
                    [
                        'class'       => 'dropdown-item py-2 text-danger',
                        'data-method' => 'post',
                    ]
                ) ?>
            </div>
        </li>

    </ul>
</nav>
<!-- /.navbar -->