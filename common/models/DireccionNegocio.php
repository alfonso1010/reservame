<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "direccion_negocio".
 *
 * @property int $id
 * @property string $pais
 * @property string $estado
 * @property string $municipio
 * @property string $colonia
 * @property string $cp
 * @property string $calle
 * @property int $no_interior
 * @property int $no_exterior
 * @property string $referencias
 * @property int $id_negocio
 *
 * @property Negocio $negocio
 */
class DireccionNegocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direccion_negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pais', 'estado', 'municipio', 'colonia', 'cp', 'calle', 'no_interior', 'no_exterior', 'referencias', 'id_negocio'], 'required'],
            [['no_interior', 'no_exterior', 'id_negocio'], 'integer'],
            [['referencias'], 'string'],
            [['pais', 'estado'], 'string', 'max' => 100],
            [['municipio', 'calle'], 'string', 'max' => 200],
            [['colonia'], 'string', 'max' => 150],
            [['cp'], 'string', 'max' => 45],
            [['id_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => Negocio::className(), 'targetAttribute' => ['id_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pais' => 'Pais',
            'estado' => 'Estado',
            'municipio' => 'Municipio',
            'colonia' => 'Colonia',
            'cp' => 'Cp',
            'calle' => 'Calle',
            'no_interior' => 'No Interior',
            'no_exterior' => 'No Exterior',
            'referencias' => 'Referencias',
            'id_negocio' => 'Id Negocio',
        ];
    }

    /**
     * Gets query for [[Negocio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNegocio()
    {
        return $this->hasOne(Negocio::className(), ['id' => 'id_negocio']);
    }
}
