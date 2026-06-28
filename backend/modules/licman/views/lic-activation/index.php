<?php

use backend\modules\licman\models\LicActivation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicActivationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'License Activations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-activation-index">

    <h3><?= Html::encode($this->title) ?>

        <p class="pull-right float-right">
            <?= Html::a('Create Lic Activation', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
        </p>
    </h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lic_app_relId',
            'activation_code',
            'activation_date',
            'active_duration',
            //'status',
            //'dec_key',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'data:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LicActivation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>