<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagosNegocio */

$this->title = 'Update Pagos Negocio: ' . $model->id_pagos_negocio;
$this->params['breadcrumbs'][] = ['label' => 'Pagos Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pagos_negocio, 'url' => ['view', 'id' => $model->id_pagos_negocio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagos-negocio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
