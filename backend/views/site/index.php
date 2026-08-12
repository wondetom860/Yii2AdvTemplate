<?php

/** @var yii\web\View $this */

$this->title = Yii::$app->params['APP_NAME'];
$this->params['breadcrumbs'][] = $this->title;

// load toastr assets from frontend/web/js and frontend/web/css

// $this->registerCssFile('/css/toastr.css', ['depends' => [\yii\web\YiiAsset::class]]);
// $this->registerJsFile('/js/toastr.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?= $this->title ?></h1>
    </div>

    <div class="body-content">
        <div class="row justify-content-center card-group">
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/employee.png" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2 text-title">Employees' Profile Management</h5>
                        <p class="card-text">
                            This submodule provides features that help us to manage profiles efficiently and effectively.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/office-structure.jpeg" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Office Structure Management</h5>
                        <p class="card-text">
                            Organization's structure starting from top commandant to lower sections/team is encoded to the system using this module.
                            This helps in controlling of chain of command and control.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/standard-placement2.jpeg" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Standard & Placement Management</h5>
                        <p class="card-text">
                            Standards and placement requirements of each section/unit is management in this submodule.
                            This handles back-history of placement and current status of an employees' title.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/app_logo2.png" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Performance Evaluation and Rating</h5>
                        <p class="card-text">
                            Standards and placement requirements of each section/unit is management in this submodule.
                            This handles back-history of placement and current status of an employees' title.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/military-rank.jpeg" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Military/Academic Record Management</h5>
                        <p class="card-text">
                            This module helps to manage employees' military profile. Current rank status, promotions and advancement in
                            rank and other military rank related operations are managed by this module.The module enables to consistenly
                            display and set previous rank promtion histories and current rank status with consistent and easily manageable
                            way.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/armory.jpeg" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Armory & Warehouse Management</h5>
                        <p class="card-text">
                            Armory equipments managing including warehouse and store done by the help of this module. It inclcudes
                            Warehouse management where registering items on arriaval and leave of store, shelf life and expiry status of
                            of items on the shelf, and transfering of items from one warehouse to the other.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/invensys.jpeg" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Inventory Management Sys.</h5>
                        <p class="card-text">
                            Standards and placement requirements of each section/unit is management in this submodule.
                            This handles back-history of placement and current status of an employees' title.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch px-2">
                <div class="card mb-4 mx-2">
                    <img class="card-img-top" src="/uploads/maintenance.png" alt="..." style='width: 100%; height: 210px;'>
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-center br-2 p-2">Maintence Management</h5>
                        <p class="card-text">
                            Tracking and Ordering of maintenance is managed by this module. Users can request for maintainace, Immidiate
                            supervisor approves the requests, and then the request is shown to manager. Allocating experts and tracking status
                            of maintenace progress are all managed by the system. Both the service requester and manager, including immidiate suppervisor
                            can track the status.
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>