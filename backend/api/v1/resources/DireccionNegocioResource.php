<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\DireccionNegocio;
use backend\api\v1\models\DireccionNegocioSearch;

class DireccionNegocioResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = DireccionNegocio::class;

    /**
    * @inheritdoc
    */
    public $searchClass = DireccionNegocioSearch::class;


}
