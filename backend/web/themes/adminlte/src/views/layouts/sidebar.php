<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?= Yii::$app->params['APP_LOGO_PATH'] ?>" alt="App Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <small class="brand-text font-weight-light"><?= Yii::$app->params['APP_NAME'] ?></small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->params['DEV_PATH'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Yii::$app->params['DEV_GITHUB'] ?>" target="_blank" class="d-block"><?= Yii::$app->params['DEV_NAME'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'RBAC',
                        'items' => [
                            ['label' => 'User', 'iconStyle' => 'far', 'url' => '/admin/user'],
                            ['label' => 'Role', 'iconStyle' => 'far', 'url' => '/admin/role'],
                            // ['label' => 'Permission', 'iconStyle' => 'far', 'url' => ''],
                            ['label' => 'Assignment', 'iconStyle' => 'far', 'url' => '/admin/assignment'],
                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>