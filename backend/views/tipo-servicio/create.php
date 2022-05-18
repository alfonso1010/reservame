<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoServicio */

$this->title = 'Create Tipo Servicio';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-servicio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
