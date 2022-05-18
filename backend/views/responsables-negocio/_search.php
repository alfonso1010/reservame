<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ResponsablesNegocioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-negocio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_responsables_negocio') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_negocio') ?>

    <?= $form->field($model, 'activo') ?>

    <?= $form->field($model, 'fecha_alta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
