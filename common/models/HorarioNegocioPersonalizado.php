<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "horario_negocio_personalizado".
 *
 * @property int $id
 * @property string $hora_apetura
 * @property string $hora_cierre
 * @property string $hora_descanso
 * @property string $hora_fin_descanso
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 * @property int $activo
 * @property int $id_negocio
 * @property string $fecha_activacion
 * @property int $dia_no_laborable
 *
 * @property Negocio $negocio
 */
class HorarioNegocioPersonalizado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario_negocio_personalizado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hora_apetura', 'hora_cierre', 'hora_descanso', 'hora_fin_descanso', 'fecha_alta', 'fecha_actualizacion', 'id_negocio', 'fecha_activacion', 'dia_no_laborable'], 'required'],
            [['fecha_alta', 'fecha_actualizacion', 'fecha_activacion'], 'safe'],
            [['activo', 'id_negocio', 'dia_no_laborable'], 'integer'],
            [['hora_apetura', 'hora_cierre', 'hora_descanso', 'hora_fin_descanso'], 'string', 'max' => 45],
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
            'hora_apetura' => 'Hora Apetura',
            'hora_cierre' => 'Hora Cierre',
            'hora_descanso' => 'Hora Descanso',
            'hora_fin_descanso' => 'Hora Fin Descanso',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'id_negocio' => 'Id Negocio',
            'fecha_activacion' => 'Fecha Activacion',
            'dia_no_laborable' => 'Dia No Laborable',
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
