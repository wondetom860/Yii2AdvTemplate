<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivation $model */

$this->title = 'Create Lic Activation';
$this->params['breadcrumbs'][] = ['label' => 'Lic Activations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-activation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
