<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivation $model */

$this->title = 'Create License Activation';
$this->params['breadcrumbs'][] = ['label' => 'License Activations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-activation-create">

    <h5><?= Html::encode($this->title . ">> " . $model->licAppRel->getAppHeader()) ?></h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>