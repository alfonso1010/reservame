<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ResponsablesNegocio */

$this->title = 'Update Responsables Negocio: ' . $model->id_responsables_negocio;
$this->params['breadcrumbs'][] = ['label' => 'Responsables Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_responsables_negocio, 'url' => ['view', 'id' => $model->id_responsables_negocio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="responsables-negocio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
