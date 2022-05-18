<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Negocio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Negocios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="negocio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'codigo_negocio',
            'nombre',
            'responsable',
            'fecha_alta',
            'fecha_actualizacion',
            'activo',
            'foto_fachada:ntext',
            'id_tipo_negocio',
            'telefono_fijo',
            'extencion',
            'telefono_celular',
        ],
    ]) ?>

</div>
