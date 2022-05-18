<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\HorarioNegocio;
use backend\api\v1\models\HorarioNegocioSearch;

class HorarioNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = HorarioNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = HorarioNegocioSearch::class;


}
