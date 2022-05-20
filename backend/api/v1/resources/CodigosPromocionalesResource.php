<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\CodigosPromocionales;
use backend\api\v1\models\CodigosPromocionalesSearch;

class CodigosPromocionalesResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = CodigosPromocionales::class;

    /**
    * @inheritdoc
    */
    public $searchClass = CodigosPromocionalesSearch::class;


}
