<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_servicio".
 *
 * @property int $id
 * @property string $nombre
 * @property int $duracion_minutos
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 * @property int $activo
 * @property int $id_negocio
 * @property float $costo_servicio
 *
 * @property Negocio $negocio
 */
class TipoServicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_servicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'duracion_minutos', 'fecha_alta', 'fecha_actualizacion', 'id_negocio', 'costo_servicio'], 'required'],
            [['duracion_minutos', 'activo', 'id_negocio'], 'integer'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['costo_servicio'], 'number'],
            [['nombre'], 'string', 'max' => 255],
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
            'nombre' => 'Nombre',
            'duracion_minutos' => 'Duracion Minutos',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'id_negocio' => 'Id Negocio',
            'costo_servicio' => 'Costo Servicio',
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
