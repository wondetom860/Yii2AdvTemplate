<?php

use backend\modules\licman\models\LicOrg8n;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicOrg8nSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Organizations/Institutions';
$this->params['breadcrumbs'][] = ['label' => 'License Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-org8n-index">

    <h3><?= Html::encode($this->title) ?>

        <p class="float-right pull-right">
            <?= Html::a('Register Organization', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
        </p>
    </h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'code',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:dMY'],
            ],
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy ? $model->createdBy->username : null;
                },
            ],
            // 'updated_at',
            //'created_by',
            //'updated_by',
            //'data:ntext',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, LicOrg8n $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>