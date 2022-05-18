<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NegocioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="negocio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codigo_negocio') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'responsable') ?>

    <?= $form->field($model, 'fecha_alta') ?>

    <?php // echo $form->field($model, 'fecha_actualizacion') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'foto_fachada') ?>

    <?php // echo $form->field($model, 'id_tipo_negocio') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <?php // echo $form->field($model, 'telefono_fijo') ?>

    <?php // echo $form->field($model, 'extencion') ?>

    <?php // echo $form->field($model, 'telefono_celular') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
