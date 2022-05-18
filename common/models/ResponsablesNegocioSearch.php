<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ResponsablesNegocio;

/**
 * ResponsablesNegocioSearch represents the model behind the search form of `common\models\ResponsablesNegocio`.
 */
class ResponsablesNegocioSearch extends ResponsablesNegocio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_responsables_negocio', 'id_usuario', 'id_negocio', 'activo'], 'integer'],
            [['fecha_alta'], 'safe'],
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
        $query = ResponsablesNegocio::find();

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
            'id_responsables_negocio' => $this->id_responsables_negocio,
            'id_usuario' => $this->id_usuario,
            'id_negocio' => $this->id_negocio,
            'activo' => $this->activo,
            'fecha_alta' => $this->fecha_alta,
        ]);

        return $dataProvider;
    }
}
