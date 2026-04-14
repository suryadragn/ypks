<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web/image/logo-ypks.png') ?>" type="image/x-icon">
    <?php $this->head() ?>
    <style>
        /* YPKS Golden Yellow Theme Overrides */
        :root {
            --bs-primary: #eab308;
            --bs-primary-rgb: 234, 179, 8;
        }
        .text-primary { color: #ca8a04 !important; }
        .bg-primary { background-color: #facc15 !important; color: #1e293b !important; }
        .bg-gradient-blue { background: linear-gradient(135deg, #422006 0%, #b45309 100%) !important; }
        .btn-primary, .btn-primary:not(:disabled):not(.disabled):active, .show > .btn-primary.dropdown-toggle {
            background-color: #facc15 !important;
            border-color: #facc15 !important;
            color: #1e293b !important;
            font-weight: 600 !important;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: #eab308 !important;
            border-color: #eab308 !important;
            color: #111827 !important;
        }
        .btn-outline-primary {
            border-color: #eab308;
            color: #ca8a04;
        }
        .btn-outline-primary:hover {
            background-color: #eab308;
            color: #1e293b;
        }
        .border-primary { border-color: #facc15 !important; }
        
        /* Dark Gradient that complements Gold */
        .hero-section {
            background: linear-gradient(rgba(30, 20, 5, 0.75), rgba(30, 20, 5, 0.85)), url('<?= Yii::getAlias("@web/image/ypks_home.jpg") ?>') no-repeat center center !important;
            background-size: cover !important;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => Html::img(Yii::getAlias('@web/image/logo-ypks.png'), [
                'alt' => Yii::$app->name,
                'style' => 'height:40px; margin-right:10px;'
            ]) . '<span class="fw-bold text-primary">' . Yii::$app->name . '</span>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top py-2',
            ],
        ]);
        $menuItems = [
            ['label' => 'Beranda', 'url' => ['/site/index']],
            ['label' => 'Profil', 'url' => ['/site/about']],
            ['label' => 'Program', 'url' => ['/site/program']],
            ['label' => 'Lembaga', 'url' => ['/site/lembaga']],
            ['label' => 'Berita', 'url' => ['/site/berita']],
            ['label' => 'Galeri', 'url' => ['/site/galeri']],
            ['label' => 'Kontak', 'url' => ['/site/contact']],
        ];
        // if (Yii::$app->user->isGuest) {
        //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        // }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
            'items' => $menuItems,
        ]);
        // if (Yii::$app->user->isGuest) {
        //     echo Html::tag('div', Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]), ['class' => ['d-flex']]);
        // } else {
        //     echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
        //         . Html::submitButton(
        //             'Logout (' . Yii::$app->user->identity->username . ')',
        //             ['class' => 'btn btn-link logout text-decoration-none']
        //         )
        //         . Html::endForm();
        // }
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-5 text-muted shadow-lg" style="background-color: #422006;">
        <div class="container">
            <div class="row text-center text-md-start gap-4 gap-md-0">
                <div class="col-md-4">
                    <h5 class="text-white fw-bold mb-3" style="letter-spacing: 0.5px;">YPKS</h5>
                    <p class="text-light opacity-75 pe-md-4">
                        www.yapendikra.or.id adalah website resmi dari Yayasan Pendidikan Karanganyar Surakarta (YPKS)
                    </p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white fw-bold mb-3" style="letter-spacing: 0.5px;">Kantor YPKS</h5>
                    <p class="text-light opacity-75">
                        <span class="d-block mb-2">📍 Jl. Lawu No.115 Karanganyar</span>
                        <span class="d-block mb-2">📞 Telp./Fax: (0271) 495212</span>
                        <span class="d-block">📮 Kode Pos 57716</span>
                    </p>
                </div>
            </div>
            <hr class="my-4 border-secondary opacity-25">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 opacity-75">&copy; <?= Html::encode('Yapendikra') ?> <?= date('Y') ?>. Hak Cipta Dilindungi.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <p class="mb-1 text-white-50 small">Ditenagai oleh Yii Framework</p>
                    <p class="mb-0 fw-bold" style="letter-spacing: 0.5px;">
                        <span class="text-white-50 fw-normal small">Project by</span>
                        <span class="text-primary" style="color: #3b82f6 !important;">Surya</span><span class="text-white">ism</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
