<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?= Yii::$app->params['APP_LOGO_PATH'] ?>" alt="App Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <small class="brand-text font-weight-light"><?= Yii::$app->params['APP_ACCRYN'] ?></small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->params['DEV_PATH'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Yii::$app->params['DEV_GITHUB'] ?>" target="_blank" class="d-block"><?= Yii::$app->params['DEV_NAME_ACCRYN'] ?></a>
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

                    [
                        'label' => 'HRM',
                        'items' => [
                            ['label' => 'Profile', 'iconStyle' => 'far', 'url' => '/hrm/profile'],
                            ['label' => 'Office Structure', 'iconStyle' => 'far', 'url' => '/hrm/loq'],
                            ['label' => 'Standard & Placement', 'iconStyle' => 'far', 'url' => '/hrm/placement'],
                            ['label' => 'Attendance & Leave', 'iconStyle' => 'far', 'url' => '/hrm/attendance'],
                        ]
                    ],

                    [
                        'label' => 'FINANCE',
                        'items' => [
                            ['label' => 'Revenues', 'iconStyle' => 'far', 'url' => '/fince/revenues'],
                            ['label' => 'Funds', 'iconStyle' => 'far', 'url' => '/fince/funds'],
                            ['label' => 'Deducts', 'iconStyle' => 'far', 'url' => '/fince/deducts'],
                            ['label' => 'Summary Dashboard', 'iconStyle' => 'far', 'url' => '/fince/dashboard'],
                        ]
                    ],

                    [
                        'label' => 'INVENTORY SYS.',
                        'items' => [
                            ['label' => 'Warehouses', 'iconStyle' => 'far', 'url' => '/invsys/warehouse'],
                            ['label' => 'Products & Category', 'iconStyle' => 'far', 'url' => '/invsys/prod-category'],
                            ['label' => 'Inventories', 'iconStyle' => 'far', 'url' => '/invsys/item-invontory'],
                            ['label' => 'Item Issue', 'iconStyle' => 'far', 'url' => '/invsys/item-issue-return'],
                            ['label' => 'Summary Dashboard', 'iconStyle' => 'far', 'url' => '/invsys/dashboard'],
                        ]
                    ],

                    [
                        'label' => 'MEDICAL SUPPLY',
                        'items' => [
                            ['label' => 'Equipments', 'iconStyle' => 'far', 'url' => '/msc/equips'],
                            ['label' => 'Pharmacy Info.', 'iconStyle' => 'far', 'url' => '/msc/pharmacy'],
                            ['label' => 'Supply Mgt.', 'iconStyle' => 'far', 'url' => '/msc/med-supply-mgt'],
                            // ['label' => 'Item Issue', 'iconStyle' => 'far', 'url' => '/invsys/item-issue-return'],
                            // ['label' => 'Summary Dashboard', 'iconStyle' => 'far', 'url' => '/invsys/dashboard'],
                        ]
                    ],

                    [
                        'label' => 'MAINTENCE',
                        'items' => [
                            ['label' => 'Garages', 'iconStyle' => 'far', 'url' => '/maint/garages'],
                            ['label' => 'Requests', 'iconStyle' => 'far', 'url' => '/maint/request'],
                            ['label' => 'Material Enquiry', 'iconStyle' => 'far', 'url' => '/main/material-enquiry'],
                            ['label' => 'Progress', 'iconStyle' => 'far', 'url' => '/maint/progess'],
                            ['label' => 'Summary Dashboard', 'iconStyle' => 'far', 'url' => '/maint/dashboard'],
                        ]
                    ],

                    [
                        'label' => 'WEAPONS',
                        'items' => [
                            ['label' => 'Warehouses', 'iconStyle' => 'far', 'url' => '/wearm/warehouse'],
                            ['label' => 'Invetory & Items', 'iconStyle' => 'far', 'url' => '/wearm/inventory'],
                            ['label' => 'Requests', 'iconStyle' => 'far', 'url' => '/weram/request'],
                            ['label' => 'Transfers', 'iconStyle' => 'far', 'url' => '/wearm/transfer-mgt'],
                            ['label' => 'Shelf Status', 'iconStyle' => 'far', 'url' => '/wearm/shelf-status'],
                            ['label' => 'Summary Dashboard', 'iconStyle' => 'far', 'url' => '/wearm/dashboard'],
                        ]
                    ],

                    [
                        'label' => 'SECURITY',
                        'items' => [
                            ['label' => 'User Log', 'iconStyle' => 'far', 'url' => '/sis/logins'],
                            ['label' => 'Accounts', 'iconStyle' => 'far', 'url' => '/sis/account'],
                            ['label' => 'Roles', 'iconStyle' => 'far', 'url' => '/sis/role'],
                            ['label' => 'Assignment', 'iconStyle' => 'far', 'url' => '/sis/role-assignment'],
                            ['label' => 'Password Mgt.', 'iconStyle' => 'far', 'url' => '/sis/reset-password'],
                            ['label' => 'Summary Dashboard', 'iconStyle' => 'far', 'url' => '/sis/dashboard'],
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