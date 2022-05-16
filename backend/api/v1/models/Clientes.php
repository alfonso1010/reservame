<?php

namespace backend\api\v1\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Clientes extends \common\models\Clientes {

	/**
	 * @inheritdoc
	 */
	public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'slug' => [
                'class' => \tecnocen\roa\behaviors\Slug::class,
                'resourceName' => 'negocios',
            ],
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('now()'),
                'createdAtAttribute' => 'fecha_alta',
                'updatedAtAttribute' => 'fecha_actualizacion',
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

}