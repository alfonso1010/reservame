<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CodigosPromocionales */

$this->title = 'Create Codigos Promocionales';
$this->params['breadcrumbs'][] = ['label' => 'Codigos Promocionales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codigos-promocionales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
