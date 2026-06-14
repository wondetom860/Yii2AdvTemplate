<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicOrg8n $model */

$this->title = 'Register Organization/Institution';
$this->params['breadcrumbs'][] = ['label' => 'Licence Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Organizations/Institutions', 'url' => ['/LICMAN/lic-org8n/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-org8n-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>