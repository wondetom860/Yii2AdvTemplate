<?php
return [
    'adminEmail' => 'admin@example.com',
    'admin-sidebar-items' => [
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

    ]
];
