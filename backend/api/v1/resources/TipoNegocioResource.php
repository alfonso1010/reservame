<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\TipoNegocio;
use backend\api\v1\models\TipoNegocioSearch;

class TipoNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = TipoNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = TipoNegocioSearch::class;


}
