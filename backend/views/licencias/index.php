<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LicenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Licencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="licencias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Licencias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'tipo_licencia',
            'duracion_dias',
            'precio',
            //'fecha_vigencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
