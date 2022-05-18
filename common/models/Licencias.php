<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "licencias".
 *
 * @property int $id
 * @property string $nombre
 * @property int $tipo_licencia
 * @property int $duracion_dias
 * @property float $precio
 * @property string $fecha_vigencia
 *
 * @property LicenciasNegocio[] $licenciasNegocios
 * @property Negocio[] $negocios
 */
class Licencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'licencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'tipo_licencia', 'duracion_dias', 'precio', 'fecha_vigencia'], 'required'],
            [['tipo_licencia', 'duracion_dias'], 'integer'],
            [['precio'], 'number'],
            [['fecha_vigencia'], 'safe'],
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
            'tipo_licencia' => 'Tipo Licencia',
            'duracion_dias' => 'Duracion Dias',
            'precio' => 'Precio',
            'fecha_vigencia' => 'Fecha Vigencia',
        ];
    }

    /**
     * Gets query for [[LicenciasNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicenciasNegocios()
    {
        return $this->hasMany(LicenciasNegocio::className(), ['id_licencia' => 'id']);
    }

    /**
     * Gets query for [[Negocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNegocios()
    {
        return $this->hasMany(Negocio::className(), ['id' => 'id_negocio'])->viaTable('licencias_negocio', ['id_licencia' => 'id']);
    }
}
