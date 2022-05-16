<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use yii\helpers\ArrayHelper;
use common\models\User;

class PerfilResource extends Resource
{

    public $idAttribute = 'id';
    
    /**
     * @inheritdoc
     */
    public $modelClass = User::class;

    public function actions() {
       $actions = parent::actions();
       unset($actions['create']);
       unset($actions['index']);
       unset($actions['update']);
       unset($actions['delete']);
       return $actions;
    }



    public function actionIndex() {
    	$roles = \Yii::$app->authManager->getRolesByUser( Yii::$app->user->getId());
      $usuario = User::findOne(Yii::$app->user->getId());
      $arreglo_nombre = reset($roles);
      $tipo_usuario = ArrayHelper::getValue($arreglo_nombre,'name','invitado');
      $perfil = [
        "id_usuario" => $usuario->id,
        "email" => $usuario->email,
        "rol" => $tipo_usuario
      ];
      return $perfil;      

    }



}
