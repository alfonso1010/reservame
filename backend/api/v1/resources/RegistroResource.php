<?php

namespace backend\api\v1\resources;

use Yii;
use common\models\User;
use common\models\Negocio;
use yii\helpers\ArrayHelper;
use common\models\Licencias;
use common\models\TipoNegocio;
use common\models\LicenciasNegocio;
use common\models\ResponsablesNegocio;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\CodigosPromocionales;

class RegistroResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = CodigosPromocionales::class;


    public function actions(){
       $actions = parent::actions();
       unset($actions['index']);
       unset($actions['update']);
       unset($actions['create']);
       unset($actions['delete']);
       unset($actions['view']);
       return $actions;
    }

    public function actionCreate(){
    	if (Yii::$app->request->isPost) {
			$data_post = Yii::$app->request->post();
			$nombre_completo = ArrayHelper::getValue($data_post, 'nombre_completo', NULL);
			$email = ArrayHelper::getValue($data_post, 'email', NULL);
			$telefono = ArrayHelper::getValue($data_post, 'telefono', NULL);
			$password = ArrayHelper::getValue($data_post, 'password', NULL);
			$tipo_negocio = ArrayHelper::getValue($data_post, 'tipo_negocio', NULL);
			$nombre_negocio = ArrayHelper::getValue($data_post, 'nombre_negocio', NULL);
			$codigo_promocion = ArrayHelper::getValue($data_post, 'codigo_promocion', NULL);
			$requeridos = ['email','password','nombre_completo','telefono','tipo_negocio','nombre_negocio'];
			foreach ($requeridos as $key => $value) {
				if ( !isset($data_post[$value]) || strlen($data_post[$value]) == 0) {
					Yii::$app->getResponse()->setStatusCode(422);
		        	return [
		        		'error' => true,
		        		'message' => "$value no válido"
		        	];
				}
			}

			if(strlen($codigo_promocion) == 6){
				$busca_codigo = CodigosPromocionales::findOne(['codigo' => $codigo_promocion,'estatus' => 0]);
					if(is_null($busca_codigo)){
						Yii::$app->getResponse()->setStatusCode(422);
			        	return [
			        		'error' => true,
			        		'message' => "Código Promocion no válido"
			        	];
					}
			}

			$busca_tipo_negocio = TipoNegocio::findOne($tipo_negocio);
			if(is_null($busca_tipo_negocio)){
				Yii::$app->getResponse()->setStatusCode(422);
	        	return [
	        		'error' => true,
	        		'message' => "Tipo Negocio no válido"
	        	];
			}
			
			//crea al usuario
			$user = new User();
	        $user->username = $email;
	        $user->email = $email;
	        $user->password = $password;
	        $user->setPassword($password);
	        $user->generateAuthKey();
	        $user->generateEmailVerificationToken();
	        if($user->save()){
	        	//asigna rol
	        	User::asignaRol($user->id,"responsable");
	        	//crea el negocio
	        	$codigo_negocio = rand(100000,999999);
	        	$existe_negocio = true;
	        	while ($existe_negocio) {
	        		$busca = Negocio::findOne(['codigo_negocio' => $codigo_negocio]);
	        		if(is_null($busca)){
	        			$existe_negocio = false;
	        		}else{
	        			$codigo_negocio = rand(100000,999999);
	        		}
	        	}
	        	//busca si existe un negocio con el codigo
	        	
	        	$negocio = new Negocio();
	        	$negocio->codigo_negocio = $codigo_negocio;
	        	$negocio->nombre = $nombre_negocio;
	        	$negocio->responsable = $nombre_completo;
	        	$negocio->fecha_alta = date("Y-m-d H:m:i");
	        	$negocio->fecha_actualizacion = date("Y-m-d H:m:i");
	        	$negocio->id_tipo_negocio = $tipo_negocio;
	        	$negocio->telefono_celular = $telefono;
	        	if($negocio->save()){
	        		//añade responsable del negocio
	        		$responsable = new ResponsablesNegocio();
	        		$responsable->id_usuario = $user->id;
	        		$responsable->id_negocio = $negocio->id;
	        		$responsable->fecha_alta = date("Y-m-d H:m:i");
	        		$responsable->activo = 0;
	        		$responsable->save(false);
	        		//se valida codigo promocion y asigna licencia
					$busca_codigo = CodigosPromocionales::findOne(['codigo' => $codigo_promocion,'estatus' => 0]);
					if(!is_null($busca_codigo)){
						$busca_codigo->estatus = 1;
						$busca_codigo->id_negocio = $negocio->id;
						$busca_codigo->save(false);
						$busca_licencia = Licencias::findOne($busca_codigo->id_licencia);
						if(!is_null($busca_licencia)){
							$licencia_negocio = new LicenciasNegocio();
							$licencia_negocio->id_negocio = $negocio->id;
							$licencia_negocio->id_licencia = $busca_licencia->id;
							$licencia_negocio->fecha_compra = date("Y-m-d");
							$licencia_negocio->fecha_vencimiento = date("Y-m-d",strtotime(date("Y-m-d")."+ ".$busca_licencia->duracion_dias." days")); 
							$licencia_negocio->fecha_renovacion = date("Y-m-d",strtotime($licencia_negocio->fecha_vencimiento."+ 1 days")); 
							$licencia_negocio->fecha_proximo_pago = $licencia_negocio->fecha_renovacion;
							$licencia_negocio->estatus = LicenciasNegocio::LICENCIA_ACTIVA;
							$licencia_negocio->estatus_texto = "LICENCIA VALIDA";
							$licencia_negocio->activo = 0;
							$licencia_negocio->save(false);
						}
					}
	        	}else{
	        		$user->delete();
	        		$error = $negocio->getFirstErrors();
					$error = reset($error);
	        		Yii::$app->getResponse()->setStatusCode(422);
		        	return [
		        		'error' => true,
		        		'message' => "Ocurrió un error al guardar los datos de  su negocio, lo sentimos, detalle: ".$error
		        	];
	        	}
				
	        }else{
	        	$error = $user->getFirstErrors();
				$error = reset($error);
	        	Yii::$app->getResponse()->setStatusCode(422);
	        	return [
	        		'error' => true,
	        		'message' => "Ocurrió un error al guardar el usuario: ".$error
	        	];
	        }

			Yii::$app->getResponse()->setStatusCode(200);
        	return [
        		'error' => false,
        		'message' => "Guardado Correcto"
        	];
		}

    }


}
