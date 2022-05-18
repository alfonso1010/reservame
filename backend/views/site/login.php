<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="section"></div>
    <main align="center">
        
          <div class="section" ></div>

          <h5 class="indigo-text">Iniciar Sesión</h5>
          <div class="section"></div>

          <div class="container">
            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                <?php $form = ActiveForm::begin(['id' => 'login-form','class' => "input-field"]); ?>


                <div class='row'>
                  <div class='col s12'>
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class' => 'validate','style' => "text-align:left"])->label('Usuario') ?>
                  </div>
                </div>

                <div class='row'>
                  <div class='input-field col s12'>
                     <?= $form->field($model, 'password')->passwordInput() ?>
                  </div>
                </div>

                <br />
                <center>
                    <div class='row'>
                        <?= Html::submitButton('Iniciar Sesión', ['class' => 'col s12 btn btn-large waves-effect indigo', 'name' => 'login-button']) ?>
                    </div>
                </center>
                <?php ActiveForm::end(); ?>
            </div>
          </div>

        <div class="section"></div>
        <div class="section"></div>
    </main>
</div>