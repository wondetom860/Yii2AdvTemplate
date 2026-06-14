<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicOrg8n $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Licence Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Institutions/Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lic-org8n-view">

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
            'name',
            'code',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:dMY@H:i'],
            ],
            [
                'attribute' => 'apps',
                'format' => 'raw',
                'value' => function ($model) {
                    return $this->render('__reports/__apps', ['model' => $model]);
                },
            ],
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy ? $model->createdBy->username : null;
                },
            ],
            'updated_at',
            'updated_by',
            'data:ntext',
        ],
    ]) ?>

</div>

<script>
    const appActivationForm = (app_id) => {
        $.get('/LICMAN/lic-activation/create', {
            app_id: app_id
        }, function(data) {
            $('#modal').find('.modal-body').html(data);
            $('#modal').modal('show');
        });
    }
    const addApp = (org_id) => {
        // pop up a modal containing app registration form from /lic-app/_form page
        $.get('/LICMAN/lic-app/create', {
            org_id: org_id
        }, function(data) {
            $('#modal').find('.modal-body').html(data);
            $('#modal').modal('show');
        });
    }
</script>