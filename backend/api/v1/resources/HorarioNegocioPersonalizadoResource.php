<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\HorarioNegocioPersonalizado;
use backend\api\v1\models\HorarioNegocioPersonalizadoSearch;

class HorarioNegocioPersonalizadoResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = HorarioNegocioPersonalizado::class;

    /**
    * @inheritdoc
    */
    public $searchClass = HorarioNegocioPersonalizadoSearch::class;


}
