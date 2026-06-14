<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicOrg8n $model */

$this->title = 'Update Lic Org8n: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Licence Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Lic Org8ns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lic-org8n-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
