<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Negocio */

$this->title = 'Create Negocio';
$this->params['breadcrumbs'][] = ['label' => 'Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="negocio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
