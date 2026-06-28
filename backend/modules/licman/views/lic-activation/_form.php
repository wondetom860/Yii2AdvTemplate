<?php

use backend\modules\licman\models\LicActivation;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lic-activation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    Html::activeHiddenInput($model, 'lic_app_relId');
    Html::activeHiddenInput($model, 'dec_key');
    Html::activeHiddenInput($model, 'activation_code');
    ?>

    <?= $form->field($model, 'activation_date')->widget(yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'active_duration')->textInput()->hint('Active Duration in days') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>