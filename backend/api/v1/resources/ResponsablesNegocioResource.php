<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\ResponsablesNegocio;
use backend\api\v1\models\ResponsablesNegocioSearch;

class ResponsablesNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = ResponsablesNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ResponsablesNegocioSearch::class;


}
