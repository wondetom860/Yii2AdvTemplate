<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicApp $model */

$this->title = 'Create Application License';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-app-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>