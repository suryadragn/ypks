<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="brand-link">
        <img src="/image/logo-ypks.png" alt="YPKS Logo" class="brand-image img-circle elevation-3 shadow-sm bg-white" style="opacity: 1; border: 1px solid rgba(255,255,255,0.2);">
        <span class="brand-text font-weight-bold"><?= Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom-0 shadow-none">
            <div class="image">
                <div class="bg-primary d-flex align-items-center justify-content-center rounded-circle elevation-1" style="width: 34px; height: 34px;">
                    <i class="fas fa-user-shield text-white small"></i>
                </div>
            </div>
            <div class="info">
                <a href="#" class="d-block font-weight-bold text-uppercase"><?= Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            /** @var \common\models\User $user */
            $user = Yii::$app->user->identity;
            
            // Logika Visibilitas Header
            $hasContentAccess = $user->canAccess(\common\models\User::PERM_NEWS) || 
                                $user->canAccess(\common\models\User::PERM_GALLERY) || 
                                $user->canAccess(\common\models\User::PERM_INSTITUTION) || 
                                $user->canAccess(\common\models\User::PERM_PROGRAM) || 
                                $user->canAccess(\common\models\User::PERM_PAGE);

            echo \hail812\adminlte3\widgets\Menu::widget([
                'items' => [
                    ['label' => 'DASHBOARD', 'header' => true],
                    ['label' => 'Beranda', 'url' => ['site/index'], 'icon' => 'th-large'],
                    [
                        'label' => 'Pesan Masuk (Inbox)', 
                        'url' => ['message/index'], 
                        'icon' => 'envelope-open-text',
                        'visible' => !Yii::$app->user->isGuest && $user->canAccess(\common\models\User::PERM_MESSAGE),
                        'badge' => (function() {
                            $count = \common\models\ContactMessage::find()->where(['is_read' => 0])->count();
                            return $count > 0 ? '<span class="badge badge-danger right">'.$count.'</span>' : '';
                        })(),
                    ],
                    
                    ['label' => 'MANAJEMEN KONTEN', 'header' => true, 'visible' => !Yii::$app->user->isGuest && $hasContentAccess],
                    ['label' => 'Berita', 'url' => ['news/index'], 'icon' => 'newspaper', 'visible' => !Yii::$app->user->isGuest && $user->canAccess(\common\models\User::PERM_NEWS)],
                    ['label' => 'Galeri', 'url' => ['gallery/index'], 'icon' => 'images', 'visible' => !Yii::$app->user->isGuest && $user->canAccess(\common\models\User::PERM_GALLERY)],
                    ['label' => 'Lembaga', 'url' => ['institution/index'], 'icon' => 'university', 'visible' => !Yii::$app->user->isGuest && $user->canAccess(\common\models\User::PERM_INSTITUTION)],
                    ['label' => 'Halaman Statis', 'url' => ['page/index'], 'icon' => 'file', 'visible' => !Yii::$app->user->isGuest && $user->canAccess(\common\models\User::PERM_PAGE)],
                    [
                        'label' => 'Program Sosial', 
                        'icon' => 'hands-helping', 
                        'visible' => !Yii::$app->user->isGuest && $user->canAccess(\common\models\User::PERM_PROGRAM),
                        'items' => [
                            ['label' => 'Daftar Program', 'url' => ['social-program/index'], 'icon' => 'list-ul'],
                            ['label' => 'Referensi Jenis', 'url' => ['social-program-type/index'], 'icon' => 'tags'],
                            ['label' => 'Rekening Donasi', 'url' => ['donation-account/index'], 'icon' => 'credit-card'],
                        ]
                    ],

                    ['label' => 'SISTEM', 'header' => true, 'visible' => !Yii::$app->user->isGuest && $user->is_superadmin],
                    [
                        'label'   => 'Verifikasi Akun',
                        'icon'    => 'user-check',
                        'url'     => ['user/index'],
                        'visible' => !Yii::$app->user->isGuest && $user->is_superadmin,
                        'badge'   => (function() {
                            $count = \common\models\User::find()
                                ->where(['status' => \common\models\User::STATUS_INACTIVE])
                                ->count();
                            return $count > 0 ? '<span class="badge badge-warning right">'.$count.'</span>' : '';
                        })(),
                    ],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank', 'visible' => YII_ENV_DEV && !Yii::$app->user->isGuest && $user->is_superadmin],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank', 'visible' => YII_ENV_DEV && !Yii::$app->user->isGuest && $user->is_superadmin],

                    ['label' => 'KONTROL AKUN', 'header' => true],
                    ['label' => 'Ganti Password', 'url' => ['user/change-password'], 'icon' => 'key', 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Logout', 'url' => ['site/logout'], 'icon' => 'sign-out-alt', 'visible' => !Yii::$app->user->isGuest, 'template' => '<a href="{url}" class="nav-link" data-method="post">{icon} <p>{label}</p></a>'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>