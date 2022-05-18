<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipoServicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-servicio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Servicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'duracion_minutos',
            'fecha_alta',
            'fecha_actualizacion',
            //'activo',
            //'id_negocio',
            //'costo_servicio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
