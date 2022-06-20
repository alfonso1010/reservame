<?php

namespace backend\api\v1\models;

use tecnocen\roa\ResourceSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class PagosNegocioSearch extends PagosNegocio implements ResourceSearch

{
	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [[['fecha_pago', 'fecha_alta','id_negocio','fecha_pago','monto_pago','estatus','id_licencia'], 'safe']];
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pagos_negocio' => $this->id_pagos_negocio,
            'fecha_pago' => $this->fecha_pago,
            'monto_pago' => $this->monto_pago,
            'estatus' => $this->estatus,
            'fecha_alta' => $this->fecha_alta,
            'id_negocio' => $this->id_negocio,
        ]);
       
        $query->andFilterWhere(['like', 'comprobante_pago', $this->comprobante_pago]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => ArrayHelper::getValue($params,'registros',20) ]
        ]);
    }
}
