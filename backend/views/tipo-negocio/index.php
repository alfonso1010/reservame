<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipoNegocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Negocios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-negocio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Negocio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion:ntext',
            'activo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
