<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivation $model */

$this->title = $model->activation_code;
$this->params['breadcrumbs'][] = ['label' => 'Licence Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'License Activations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lic-activation-view">

    <h3><?= Html::encode($this->title) ?>

        <p class="pull-right float-right">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-xs',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'lic_app_relId',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->licAppRel->getAppHeader();
                }
            ],
            'activation_code',
            [
                'attribute' => 'activation_date',
                'value' => function ($model) {
                    return date('dMY', $model->activation_date);
                }
            ],
            'active_duration',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->getStatusText();
                }
            ],
            'dec_key',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('dMY', $model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return $model->updated_at ? date('dMY', $model->updated_at) : 'NA';
                }
            ],
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy->username;
                }
            ],
            [
                'attribute' => 'updated_by',
                'value' => function ($model) {
                    return $model->updated_by ? $model->updatedBy->username : 'NA';
                }
            ],
            // 'data:ntext',
        ],
    ]) ?>

</div>