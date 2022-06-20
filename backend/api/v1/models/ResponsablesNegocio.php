<?php

namespace backend\api\v1\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class ResponsablesNegocio extends \common\models\ResponsablesNegocio {

	/**
	 * @inheritdoc
	 */
	public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'slug' => [
                'class' => \tecnocen\roa\behaviors\Slug::class,
                'resourceName' => 'responsables-negocio',
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('now()'),
                'createdAtAttribute' => 'fecha_alta',
                'updatedAtAttribute' => 'fecha_alta',
            ],
			'softDeleteBehavior' => [
                'class' => \yii2tech\ar\softdelete\SoftDeleteBehavior::className(),
                'softDeleteAttributeValues' => [
                    'activo' => true
                ]
            ]
        ]);
    }	

	/**
	 * @inheritdoc
	 */
	public function getLinks() {
		return array_merge($this->slugLinks, [
				'curies'      => new \yii\web\Link([
						'name'      => 'docs',
						'title'     => 'Resource Documentation',
						'href'      => 'http://swagger.com/demo/{rel}',
						'templated' => true,
					])
			]);
	}

    /**
     * @inheritdoc
     */
    public function extraFields()
    {
        return [
            'negocio',
            'direccionNegocio',
            'tipoNegocio' => function ($model){
                return $model->negocio->tipoNegocio;
            },
            'licencia' => function ($model){
                $licencias = $model->negocio->licenciasNegocios;
                $todas = [];
                foreach ($licencias as $key => $licencia) {
                    $todas[] = [
                        'fecha_compra' => $licencia->fecha_compra,
                        'fecha_vencimiento' => $licencia->fecha_vencimiento,
                        'fecha_renovacion' => $licencia->fecha_renovacion,
                        'estatus_texto' => $licencia->estatus_texto ,
                        'estatus  ' => $licencia->estatus ,
                        'fecha_proximo_pago' => ($licencia->licencia->tipo_licencia == 2)?"NA":$licencia->fecha_proximo_pago ,
                        'nombre' => $licencia->licencia->nombre,
                        'duracion_dias' => $licencia->licencia->duracion_dias,
                        'precio' => \Yii::$app->formatter->asCurrency($licencia->licencia->precio),
                    ];
                }
                return $todas;
            },
            'pagos' => function ($model){
                $pagos_model = $model->negocio->pagosNegocios;
                return $pagos_model;
            }
        ];
    }

}