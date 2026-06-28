<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicApp $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Licence Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lic-app-view">

    <h3><?= Html::encode($this->title) ?>

        <p class="float-right pull-right">
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
                'attribute' => 'org_relId',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->orgRel->name;
                }
            ],
            'name',
            'version',
            [
                'attribute' => 'release_date',
                'value' => function ($model) {
                    return date('dMY', $model->release_date);
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $text = $model->status ? 'bg-success' : 'bg-danger';
                    $active_status_text = $model->getStatusLabel($model->status);
                    return "<span class='badge {$text}'>{$active_status_text}</span>";
                }
            ],
            [
                'attribute' => 'licenses',
                'format' => 'raw',
                'value' => function ($model) {
                    return $this->render('__reports/licences', ['model' => $model]);
                }
            ],
            [
                'attribute' => 'params_string_json',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<textarea rows=6 cols=70 style='width: 98%; padding: 3px; border-radius: 4px; background-color: rgb(171, 182, 174); font-size:11pt'>" . htmlspecialchars(implode('\n', json_decode($model->params_string_json, true))) . "</textarea>";
                }
            ],
            [
                'attribute' => 'enc_key',
                'format' => 'raw',
                'value' => function ($model) {
                    $rer = json_decode($model->enc_key, true);
                    return "<textarea rows=6 cols=70 style='width: 98%; padding: 3px; border-radius: 4px; background-color: rgb(214, 231, 219); font-size:11pt'>" . htmlspecialchars($rer ? implode('\n', $rer) : $model->enc_key) . "</textarea>";
                }
            ],

            [
                'attribute' => 'params_array_serialized',
                'format' => 'raw',
                'value' => function ($model) {
                    $rer = json_decode($model->params_array_serialized, true);
                    return "<textarea rows=6 cols=70 style='width: 98%; padding: 3px; border-radius: 4px; background-color: rgb(171, 182, 174); font-size:11pt'>" . htmlspecialchars($rer ? implode('\n', $rer) : $model->params_array_serialized) . "</textarea>";
                }
            ],
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
            // 'updated_by',
            // 'data:ntext',
        ],
    ]) ?>

</div>

<script>
    const createLicenceActivation = (appId) => {
        $.get('/LICMAN/lic-activation/create', {
            app_id: appId
        }, function(data) {
            $('#modal').find('.modal-body').html(data);
            $('#modal').modal('show');
        });
    }
</script>