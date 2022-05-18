<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ResponsablesNegocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Responsables Negocios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsables-negocio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Responsables Negocio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_responsables_negocio',
            'id_usuario',
            'id_negocio',
            'activo',
            'fecha_alta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
