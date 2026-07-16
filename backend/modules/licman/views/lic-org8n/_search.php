<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicOrg8nSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lic-org8n-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row row-cols-1 row-cols-md-3 mr-n2 ml-n2">
        <div class="col-md-5 col-sm-5 col-12">
            <?= $form->field($model, 'name') ?>
        </div>
        <div class="col-md-5 col-sm-5 col-12">
            <?= $form->field($model, 'code') ?>
        </div>

        <div class="col-md-2 col-sm-2 col-12"><br>
            <div class="form-group mt-2 pull-right">
                <?= Html::submitButton('Search', ['class' => 'btn btn-xs btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-xs btn-outline-secondary']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>