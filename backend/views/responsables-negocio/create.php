<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ResponsablesNegocio */

$this->title = 'Create Responsables Negocio';
$this->params['breadcrumbs'][] = ['label' => 'Responsables Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsables-negocio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
