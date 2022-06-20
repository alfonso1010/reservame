<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PagosNegocio;

/**
 * PagosNegocioSearch represents the model behind the search form of `common\models\PagosNegocio`.
 */
class PagosNegocioSearch extends PagosNegocio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pagos_negocio', 'estatus', 'id_negocio'], 'integer'],
            [['fecha_pago', 'comprobante_pago', 'fecha_alta'], 'safe'],
            [['monto_pago'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PagosNegocio::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

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

        return $dataProvider;
    }
}
