<?php

use yii\helpers\Html;

if (isset($model)) {
    $this->title = 'Apps for ' . $model->name;
    // if (Yii::$app->user->can('@')) {
    //     $addBtn = Html::a('Add App', ['lic-app8n/create', 'org_id' => $model->id], ['class' => 'btn btn-success btn-xs float-right']);
    // } else {
    //     $addBtn = '';
    // }
    $addBtn = Html::a('Add App', ['#'], ['class' => 'btn btn-success btn-xs float-right', 'onclick' => "addApp({$model->id});return false;"]);

    echo "<h5>" . Html::encode($this->title) . $addBtn . "</h5>";
    echo "<table class='table table-bordered table-striped' style='font-size: 9pt;'>
            <tr>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>Active Status</th>
            </tr>";
    foreach ($model->licApps as $app) {
        $activationBtn = Html::a('Manage Activations', ['#'], ['class' => 'btn btn-info btn-xs float-right', 'onclick' => "appActivationForm({$app->id});return false;"]);
        echo "<tr>
                    <td>" . Html::a(Html::encode($app->name), ['lic-app/view', 'id' => $app->id]) . "</td>
                    <td>" . Html::encode($app->version) . "</td>
                    <td>" . date('dMY', $app->release_date) . "</td>
                    <td>" . Html::encode($app->getStatusLabel()) . $activationBtn . "</td>
                </tr>";
    }
    echo "</table>";
} else {
    $this->title = 'Apps';
}
