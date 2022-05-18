<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pagos_negocio".
 *
 * @property int $id_pagos_negocio
 * @property string $fecha_pago
 * @property float $monto_pago
 * @property string $comprobante_pago
 * @property int $estatus
 * @property string $fecha_alta
 * @property int $id_negocio
 *
 * @property Negocio $negocio
 */
class PagosNegocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagos_negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_pago', 'monto_pago', 'comprobante_pago', 'estatus', 'fecha_alta', 'id_negocio'], 'required'],
            [['fecha_pago', 'fecha_alta'], 'safe'],
            [['monto_pago'], 'number'],
            [['comprobante_pago'], 'string'],
            [['estatus', 'id_negocio'], 'integer'],
            [['id_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => Negocio::className(), 'targetAttribute' => ['id_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pagos_negocio' => 'Id Pagos Negocio',
            'fecha_pago' => 'Fecha Pago',
            'monto_pago' => 'Monto Pago',
            'comprobante_pago' => 'Comprobante Pago',
            'estatus' => 'Estatus',
            'fecha_alta' => 'Fecha Alta',
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
