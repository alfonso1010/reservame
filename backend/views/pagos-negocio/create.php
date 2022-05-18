<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagosNegocio */

$this->title = 'Create Pagos Negocio';
$this->params['breadcrumbs'][] = ['label' => 'Pagos Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-negocio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
