<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Clientes;
use backend\api\v1\models\ClientesSearch;

class ClientesResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Clientes::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ClientesSearch::class;


}
