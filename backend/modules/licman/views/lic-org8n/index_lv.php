<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var backend\modules\licman\models\LicOrg8nSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Organizations/Institutions';
$this->params['breadcrumbs'][] = ['label' => 'License Management', 'url' => ['/LICMAN/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lic-org8n-index">

    <h3><?= Html::encode($this->title) ?>

        <p class="float-right">
            <?= Html::a('Register Organization', ['create'], ['class' => 'btn btn-success btn-xs']) ?>
        </p>
    </h3>

    <?php  echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_card_item',
        'layout' => "{items}\n{pager}",
        'options' => [
            'tag' => 'div',
            'class' => 'row row-cols-1 row-cols-md-4 mr-n2 ml-n2', // row-cols works in BS 4.6+
        ],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col mb-4 d-flex align-items-stretch px-2', // Forces columns to equal height
        ],
    ]);
    ?>

</div>