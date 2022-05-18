<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PagosNegocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos Negocios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-negocio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pagos Negocio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pagos_negocio',
            'fecha_pago',
            'monto_pago',
            'comprobante_pago:ntext',
            'estatus',
            //'fecha_alta',
            //'id_negocio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
