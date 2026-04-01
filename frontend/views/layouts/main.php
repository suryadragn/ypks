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

    <footer class="footer mt-auto py-5 text-muted shadow-lg" style="background-color: #0f172a;">
        <div class="container">
            <div class="row text-center text-md-start gap-4 gap-md-0">
                <div class="col-md-4">
                    <h5 class="text-white fw-bold mb-3" style="letter-spacing: 0.5px;">YPKS</h5>
                    <p class="text-light opacity-75 pe-md-4">
                        www.yapendikra.or.id adalah website resmi dari Yayasan Pendidikan Karanganyar Surakarta (YPKS)
                    </p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white fw-bold mb-3" style="letter-spacing: 0.5px;">Kantor Pusat YPKS</h5>
                    <p class="text-light opacity-75">
                        <span class="d-block mb-2">📍 Jl. Lawu No.115 Karanganyar</span>
                        <span class="d-block mb-2">📞 Telp./Fax: (0271) 495212</span>
                        <span class="d-block">📮 Kode Pos 57716</span>
                    </p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white fw-bold mb-3" style="letter-spacing: 0.5px;">Sekretariat YPKS</h5>
                    <p class="text-light opacity-75">
                        <span class="d-block mb-2">📍 Jl. Lawu, Harjosari, Popongan, Karanganyar</span>
                        <span class="d-block mb-2">📞 Telp./Fax: (0271) 495284</span>
                        <span class="d-block">📮 Kode Pos 57715</span>
                    </p>
                </div>
            </div>
            <hr class="my-4 border-secondary opacity-25">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 opacity-75">&copy; <?= Html::encode('Yapendikra') ?> <?= date('Y') ?>. Hak Cipta Dilindungi.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0 opacity-75">
                    <p class="mb-0">Ditenagai oleh Yii Framework</p>
                </div>
            </div>
        </div>
    </footer>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
