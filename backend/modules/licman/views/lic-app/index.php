<?php

use backend\modules\licman\models\LicApp;
use backend\modules\licman\models\LicOrg8n;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicAppSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Applications';
$this->params['breadcrumbs'][] = ['label' => 'License Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-app-index">

    <h3><?= Html::encode($this->title) ?>

        <p class="pull-right float-right">
            <?= Html::a('Register Application', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
        </p>
    </h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'org_relId',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->orgRel->name;
                },
                'filter' => ArrayHelper::map(LicOrg8n::find()->all(), 'id', 'name'),
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
                    $active_status_text = $model->getAppStatusText($model->status);
                    return "<span class='badge {$text}'>{$active_status_text}</span>";
                }
            ],
            //'params_string_json:ntext',
            //'params_array_serialized:ntext',
            //'enc_key',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'data:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LicApp $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>