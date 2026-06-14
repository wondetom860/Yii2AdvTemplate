<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicApp $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lic Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lic-app-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'version',
            'release_date',
            'status',
            'params_string_json:ntext',
            'params_array_serialized:ntext',
            'org_relId',
            'enc_key',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'data:ntext',
        ],
    ]) ?>

</div>
