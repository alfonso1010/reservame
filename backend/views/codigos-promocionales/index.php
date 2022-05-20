<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CodigosPromocionalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Codigos Promocionales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigos-promocionales-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Codigos Promocionales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo',
            'estatus',
            'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
