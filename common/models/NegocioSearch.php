<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Negocio;

/**
 * NegocioSearch represents the model behind the search form of `common\models\Negocio`.
 */
class NegocioSearch extends Negocio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'activo', 'id_tipo_negocio'], 'integer'],
            [['codigo_negocio', 'nombre', 'responsable', 'fecha_alta', 'fecha_actualizacion', 'foto_fachada', 'telefono_fijo', 'extencion', 'telefono_celular'], 'safe'],
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
        $query = Negocio::find();

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
            'id' => $this->id,
            'fecha_alta' => $this->fecha_alta,
            'fecha_actualizacion' => $this->fecha_actualizacion,
            'activo' => $this->activo,
            'id_tipo_negocio' => $this->id_tipo_negocio,
        ]);

        $query->andFilterWhere(['like', 'codigo_negocio', $this->codigo_negocio])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'responsable', $this->responsable])
            ->andFilterWhere(['like', 'foto_fachada', $this->foto_fachada])
            ->andFilterWhere(['like', 'telefono_fijo', $this->telefono_fijo])
            ->andFilterWhere(['like', 'extencion', $this->extencion])
            ->andFilterWhere(['like', 'telefono_celular', $this->telefono_celular]);

        return $dataProvider;
    }
}
