<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagosNegocioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-negocio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pagos_negocio') ?>

    <?= $form->field($model, 'fecha_pago') ?>

    <?= $form->field($model, 'monto_pago') ?>

    <?= $form->field($model, 'comprobante_pago') ?>

    <?= $form->field($model, 'estatus') ?>

    <?php // echo $form->field($model, 'fecha_alta') ?>

    <?php // echo $form->field($model, 'id_negocio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
