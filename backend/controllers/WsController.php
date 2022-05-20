<?php

namespace backend\controllers;

use Yii;
use common\models\CodigosPromocionales;
use common\models\CodigosPromocionalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CodigosPromocionalesController implements the CRUD actions for CodigosPromocionales model.
 */
class WsController extends Controller
{
    
    public function actionGetCodigos()
    {
    	$codigo = Yii::$app->request->get('codigo');    	
    	$get = CodigosPromocionales::findOne(['codigo' => $codigo]);
    	if(!is_null($get)){
    		return json_encode([
    			'error' => false,
    			'codigo' => $get->codigo
    		]);
    	}else{
    		return json_encode([
    			'error' => true,
    			'codigo' => 0
    		]);
    	}
    }

   
}
