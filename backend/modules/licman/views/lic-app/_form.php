<?php

use backend\modules\licman\models\LicApp;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicApp $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lic-app-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        Html::activeHiddenInput($model, 'org_relId');
        Html::activeHiddenInput($model, 'enc_key') 
        
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'release_date')->textInput(['placeholder' => 'e.g., 01Jan23'])->hint('Format: dMY') ?>

    <?= $form->field($model, 'status')->dropDownList(LicApp::$app_status) ?>

    <?= $form->field($model, 'params_string_json')->textarea(['rows' => 4, 'readonly' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>