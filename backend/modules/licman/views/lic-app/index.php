<?php

use backend\modules\licman\models\LicApp;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicAppSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lic Apps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-app-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lic App', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'version',
            'release_date',
            'status',
            //'params_string_json:ntext',
            //'params_array_serialized:ntext',
            //'org_relId',
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
