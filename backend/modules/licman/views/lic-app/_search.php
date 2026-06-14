<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicAppSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lic-app-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'version') ?>

    <?= $form->field($model, 'release_date') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'params_string_json') ?>

    <?php // echo $form->field($model, 'params_array_serialized') ?>

    <?php // echo $form->field($model, 'org_relId') ?>

    <?php // echo $form->field($model, 'enc_key') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
