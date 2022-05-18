<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "licencias_negocio".
 *
 * @property int $id_negocio
 * @property int $id_licencia
 * @property string $fecha_compra
 * @property string $fecha_vencimiento
 * @property string $fecha_renovacion
 * @property string $estatus_texto
 * @property int $estatus
 * @property int $activo
 * @property string $fecha_proximo_pago
 *
 * @property Licencias $licencia
 * @property Negocio $negocio
 */
class LicenciasNegocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencias_negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_negocio', 'id_licencia', 'fecha_compra', 'fecha_vencimiento', 'fecha_renovacion', 'estatus_texto', 'fecha_proximo_pago'], 'required'],
            [['id_negocio', 'id_licencia', 'estatus', 'activo'], 'integer'],
            [['fecha_compra', 'fecha_vencimiento', 'fecha_renovacion', 'fecha_proximo_pago'], 'safe'],
            [['estatus_texto'], 'string', 'max' => 45],
            [['id_negocio', 'id_licencia'], 'unique', 'targetAttribute' => ['id_negocio', 'id_licencia']],
            [['id_licencia'], 'exist', 'skipOnError' => true, 'targetClass' => Licencias::className(), 'targetAttribute' => ['id_licencia' => 'id']],
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
            'id_licencia' => 'Id Licencia',
            'fecha_compra' => 'Fecha Compra',
            'fecha_vencimiento' => 'Fecha Vencimiento',
            'fecha_renovacion' => 'Fecha Renovacion',
            'estatus_texto' => 'Estatus Texto',
            'estatus' => 'Estatus',
            'activo' => 'Activo',
            'fecha_proximo_pago' => 'Fecha Proximo Pago',
        ];
    }

    /**
     * Gets query for [[Licencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicencia()
    {
        return $this->hasOne(Licencias::className(), ['id' => 'id_licencia']);
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
