<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivation $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lic-activation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lic_app_relId')->textInput() ?>

    <?= $form->field($model, 'activation_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activation_date')->textInput() ?>

    <?= $form->field($model, 'active_duration')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'dec_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
