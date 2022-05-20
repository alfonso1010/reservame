<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "codigos_promocionales".
 *
 * @property int $id
 * @property string $codigo
 * @property int $estatus
 * @property string $fecha_alta
 */
class CodigosPromocionales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codigos_promocionales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'estatus','id_licencia'], 'required'],
            [['estatus','id_negocio'], 'integer'],
            [['fecha_alta'], 'safe'],
            [['codigo'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'id_licencia' => 'id_licencia',
            'id_negocio' => 'id_negocio',
            'estatus' => 'Estatus',
            'fecha_alta' => 'Fecha Alta',
        ];
    }
}
