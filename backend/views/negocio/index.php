<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NegocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Negocios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negocio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Negocio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo_negocio',
            'nombre',
            'responsable',
            'fecha_alta',
            //'fecha_actualizacion',
            //'activo',
            //'foto_fachada:ntext',
            //'id_tipo_negocio',
            //'telefono_fijo',
            //'extencion',
            //'telefono_celular',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
