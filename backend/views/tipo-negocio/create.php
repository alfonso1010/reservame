<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoNegocio */

$this->title = 'Create Tipo Negocio';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-negocio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
