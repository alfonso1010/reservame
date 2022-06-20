<?php

namespace backend\api\v1\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

class Negocio extends \common\models\Negocio {

	/**
	 * @inheritdoc
	 */
	public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'slug' => [
                'class' => \tecnocen\roa\behaviors\Slug::class,
                'resourceName' => 'negocio',
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

	public function beforeValidate() {

		if(Yii::$app->request->isPost || Yii::$app->request->isPut || Yii::$app->request->isPatch) {
			$imagen = Yii::$app->request->post('foto_fachada');
			if(!is_null($imagen)){
				$filename = Yii::getAlias(
				    '@backend/web/imagesNegocios/'.$this->nombre
				);
				$file = self::getNombreImagen($imagen,$filename,$this->nombre);
				$this->foto_fachada = $file;
				$this->nombre;
			}
		}
		return true;
	}

	public function getNombreImagen($Base64Img,$file,$nombre)
    {
        $arr1 = explode(',', $Base64Img);
        $content = $arr1[0];
        $content = explode(";", $content);
        $content = explode(":", $content[0]);
        $type = $content[1];
        $ext = ($type == "image/png") ? ".png" : ".jpg";
        $base64 = $arr1[1];
        $file = $file.$ext;
        file_put_contents($file, base64_decode($base64));
        $size = filesize($file);
        return $nombre.$ext;
    }


}