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

    <div class="body-content m-2">
        <div class="row container-fluid m-auto">
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="/uploads/app_logo2.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Employees' Profile Management</h5>
                    <p class="card-text">
                        This submodule provides features that help us to manage profiles efficiently and effectively.
                    </p>
                    <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img class="card-img-top" src="/uploads/app_logo2.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Office Structure Management</h5>
                    <p class="card-text">
                        Organization's structure starting from top commandant to lower sections/team is encoded to the system using this module.
                        This helps in controlling of chain of command and control.
                    </p>
                    <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                </div>
            </div>

            <div class="card m-2" style='width: 18rem;'>
                <img class="card-img-top" src="/uploads/app_logo2.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Standard & Placement Management</h5>
                    <p class="card-text">
                        Standards and placement requirements of each section/unit is management in this submodule.
                        This handles back-history of placement and current status of an employees' title.
                    </p>
                    <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                </div>
            </div>

            <div class="card m-2" style='width: 18rem;'>
                <img class="card-img-top" src="/uploads/app_logo2.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Performance Evaluation and Rating</h5>
                    <p class="card-text">
                        Standards and placement requirements of each section/unit is management in this submodule.
                        This handles back-history of placement and current status of an employees' title.
                    </p>
                    <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                </div>
            </div>

            <div class="card m-2" style='width: 18rem;'>
                <img class="card-img-top" src="/uploads/app_logo2.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Military/Academic Record Management</h5>
                    <p class="card-text">
                        Standards and placement requirements of each section/unit is management in this submodule.
                        This handles back-history of placement and current status of an employees' title.
                    </p>
                    <p class="card-text mt-auto"><small class="text-muted">This module is part of HRM</small></p>
                </div>
            </div>
        </div>
    </div>
</div>