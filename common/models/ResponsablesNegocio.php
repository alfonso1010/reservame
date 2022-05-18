<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "responsables_negocio".
 *
 * @property int $id_responsables_negocio
 * @property int $id_usuario
 * @property int $id_negocio
 * @property int $activo
 * @property string $fecha_alta
 *
 * @property Negocio $negocio
 */
class ResponsablesNegocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responsables_negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_negocio', 'fecha_alta'], 'required'],
            [['id_usuario', 'id_negocio', 'activo'], 'integer'],
            [['fecha_alta'], 'safe'],
            [['id_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => Negocio::className(), 'targetAttribute' => ['id_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_responsables_negocio' => 'Id Responsables Negocio',
            'id_usuario' => 'Id Usuario',
            'id_negocio' => 'Id Negocio',
            'activo' => 'Activo',
            'fecha_alta' => 'Fecha Alta',
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
