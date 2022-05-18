<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\Negocio;
use backend\api\v1\models\NegocioSearch;

class NegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = Negocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = NegocioSearch::class;


}
