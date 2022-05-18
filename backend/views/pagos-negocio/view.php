<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PagosNegocio */

$this->title = $model->id_pagos_negocio;
$this->params['breadcrumbs'][] = ['label' => 'Pagos Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pagos-negocio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pagos_negocio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pagos_negocio], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pagos_negocio',
            'fecha_pago',
            'monto_pago',
            'comprobante_pago:ntext',
            'estatus',
            'fecha_alta',
            'id_negocio',
        ],
    ]) ?>

</div>
