<?php

namespace backend\api\v1\models;

use tecnocen\roa\ResourceSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class CodigosPromocionalesSearch extends CodigosPromocionales implements ResourceSearch

{
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function search(array $params, $formName = '')
    {
        $this->load($params, $formName);
        if (!$this->validate()) {
            return null;
        }
        $codigo = ArrayHelper::getValue($params, 'codigo',"");
        $query = static::find()->where(['codigo' => $codigo]);
        

        

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => ArrayHelper::getValue($params,'registros',20) ]
        ]);
    }
}
