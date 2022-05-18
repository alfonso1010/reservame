<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reservacion_cliente".
 *
 * @property int $id_negocio
 * @property string $fecha_reservacion
 * @property string $hora_reservacion
 * @property int $estatus
 * @property string|null $comentarios
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 * @property int $activo
 * @property string|null $adicionales
 * @property float $costo_servicio
 * @property string $nombre_servicio
 * @property int $duracion_minutos
 * @property string $nombre_cliente
 * @property string|null $telefono_cliente
 * @property string|null $email_cliente
 * @property int|null $id_usuario
 * @property string $nombre_responsable
 *
 * @property Negocio $negocio
 */
class ReservacionCliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservacion_cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_negocio', 'fecha_reservacion', 'hora_reservacion', 'fecha_alta', 'fecha_actualizacion', 'costo_servicio', 'nombre_servicio', 'duracion_minutos', 'nombre_cliente', 'nombre_responsable'], 'required'],
            [['id_negocio', 'estatus', 'activo', 'duracion_minutos', 'id_usuario'], 'integer'],
            [['fecha_reservacion', 'hora_reservacion', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['comentarios', 'adicionales'], 'string'],
            [['costo_servicio'], 'number'],
            [['nombre_servicio', 'nombre_responsable'], 'string', 'max' => 255],
            [['nombre_cliente', 'telefono_cliente'], 'string', 'max' => 45],
            [['email_cliente'], 'string', 'max' => 100],
            [['id_negocio'], 'unique'],
            [['id_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => Negocio::className(), 'targetAttribute' => ['id_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_negocio' => 'Id Negocio',
            'fecha_reservacion' => 'Fecha Reservacion',
            'hora_reservacion' => 'Hora Reservacion',
            'estatus' => 'Estatus',
            'comentarios' => 'Comentarios',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'adicionales' => 'Adicionales',
            'costo_servicio' => 'Costo Servicio',
            'nombre_servicio' => 'Nombre Servicio',
            'duracion_minutos' => 'Duracion Minutos',
            'nombre_cliente' => 'Nombre Cliente',
            'telefono_cliente' => 'Telefono Cliente',
            'email_cliente' => 'Email Cliente',
            'id_usuario' => 'Id Usuario',
            'nombre_responsable' => 'Nombre Responsable',
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
