<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\PagosNegocio;
use backend\api\v1\models\PagosNegocioSearch;

class PagosNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = PagosNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = PagosNegocioSearch::class;


}
