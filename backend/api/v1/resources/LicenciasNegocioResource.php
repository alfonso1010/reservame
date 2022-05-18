<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\LicenciasNegocio;
use backend\api\v1\models\LicenciasNegocioSearch;

class LicenciasNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = LicenciasNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = LicenciasNegocioSearch::class;


}
