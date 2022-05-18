<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_negocio".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $activo
 *
 * @property Negocio[] $negocios
 */
class TipoNegocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['descripcion'], 'string'],
            [['activo'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
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
            'descripcion' => 'Descripcion',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[Negocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNegocios()
    {
        return $this->hasMany(Negocio::className(), ['id_tipo_negocio' => 'id']);
    }
}
