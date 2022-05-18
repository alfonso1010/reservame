<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagosNegocio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-negocio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_pago')->textInput() ?>

    <?= $form->field($model, 'monto_pago')->textInput() ?>

    <?= $form->field($model, 'comprobante_pago')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'estatus')->textInput() ?>

    <?= $form->field($model, 'fecha_alta')->textInput() ?>

    <?= $form->field($model, 'id_negocio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
