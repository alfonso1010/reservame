<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Negocio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="negocio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_negocio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <?= $form->field($model, 'fecha_actualizacion')->textInput() ?>

    <?= $form->field($model, 'activo')->textInput() ?>

    <?= $form->field($model, 'foto_fachada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_tipo_negocio')->textInput() ?>

    <?= $form->field($model, 'telefono_fijo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extencion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_celular')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
