<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivation $model */

$this->title = 'Update Lic Activation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lic Activations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lic-activation-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
