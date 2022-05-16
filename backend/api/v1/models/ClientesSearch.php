<?php

namespace backend\api\v1\models;

use tecnocen\roa\ResourceSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class ClientesSearch extends Clientes implements ResourceSearch

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

        $query = static::find();

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => ArrayHelper::getValue($params,'registros',20) ]
        ]);
    }
}
