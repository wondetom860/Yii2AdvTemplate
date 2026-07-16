<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \backend\modules\licman\models\LicOrg8n $model
 */
$tr = true;
?>

<div class="card w-100">
    <!-- Optional: Add card-img-top here if needed -->
    <div class="card-img-top">
        <img src="/uploads/app_logo2.png" height="200" class="card-img-top m-auto" alt="Organization Image">
    </div>
    <div class="card-body d-flex flex-column">
        <h5 class="card-title"><?= Html::encode($model->name) ?></h5>

        <!-- flex-grow-1 forces this paragraph to fill empty space -->
        <p class="card-text flex-grow-2">
            <?= Html::encode(substr($model->code, 0, 100)) ?> ...
        </p>
        <!-- mt-auto pushes the footer/button to the absolute bottom -->
        <div class="mt-auto pt-3">
            <?= Html::a('View Details', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    </div>
</div>