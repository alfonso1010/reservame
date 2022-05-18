<?php

namespace backend\api\v1\resources;

use Yii;
use tecnocen\roa\controllers\Resource;
use backend\api\v1\models\ReservacionCliente;
use backend\api\v1\models\ReservacionClienteSearch;

class ReservacionClienteResource extends Resource
{
    /**
     * @inheritdoc
     */
    public $modelClass = ReservacionCliente::class;

    /**
    * @inheritdoc
    */
    public $searchClass = ReservacionClienteSearch::class;


}
