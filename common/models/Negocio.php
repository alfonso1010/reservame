<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "negocio".
 *
 * @property int $id
 * @property string $codigo_negocio
 * @property string $nombre
 * @property string $responsable
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 * @property int $activo
 * @property string|null $foto_fachada
 * @property int $id_tipo_negocio
 * @property string|null $telefono_fijo
 * @property string|null $extencion
 * @property string $telefono_celular
 *
 * @property DireccionNegocio[] $direccionNegocios
 * @property HorarioNegocio[] $horarioNegocios
 * @property HorarioNegocioPersonalizado[] $horarioNegocioPersonalizados
 * @property LicenciasNegocio[] $licenciasNegocios
 * @property Licencias[] $licencias
 * @property TipoNegocio $tipoNegocio
 * @property PagosNegocio[] $pagosNegocios
 * @property ReservacionCliente $reservacionCliente
 * @property ResponsablesNegocio[] $responsablesNegocios
 * @property TipoServicio[] $tipoServicios
 */
class Negocio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'negocio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_negocio', 'nombre', 'responsable', 'fecha_alta', 'fecha_actualizacion', 'id_tipo_negocio', 'telefono_celular'], 'required'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['activo', 'id_tipo_negocio'], 'integer'],
            [['foto_fachada'], 'string'],
            [['codigo_negocio', 'telefono_fijo', 'extencion', 'telefono_celular'], 'string', 'max' => 45],
            [['nombre', 'responsable'], 'string', 'max' => 255],
            [['id_tipo_negocio'], 'exist', 'skipOnError' => true, 'targetClass' => TipoNegocio::className(), 'targetAttribute' => ['id_tipo_negocio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_negocio' => 'Codigo Negocio',
            'nombre' => 'Nombre',
            'responsable' => 'Responsable',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'foto_fachada' => 'Foto Fachada',
            'id_tipo_negocio' => 'Id Tipo Negocio',
            'telefono_fijo' => 'Telefono Fijo',
            'extencion' => 'Extencion',
            'telefono_celular' => 'Telefono Celular',
        ];
    }

    /**
     * Gets query for [[DireccionNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionNegocios()
    {
        return $this->hasMany(DireccionNegocio::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[HorarioNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioNegocios()
    {
        return $this->hasMany(HorarioNegocio::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[HorarioNegocioPersonalizados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioNegocioPersonalizados()
    {
        return $this->hasMany(HorarioNegocioPersonalizado::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[LicenciasNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicenciasNegocios()
    {
        return $this->hasMany(LicenciasNegocio::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[Licencias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLicencias()
    {
        return $this->hasMany(Licencias::className(), ['id' => 'id_licencia'])->viaTable('licencias_negocio', ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[TipoNegocio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoNegocio()
    {
        return $this->hasOne(TipoNegocio::className(), ['id' => 'id_tipo_negocio']);
    }

    /**
     * Gets query for [[PagosNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagosNegocios()
    {
        return $this->hasMany(PagosNegocio::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[ReservacionCliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservacionCliente()
    {
        return $this->hasOne(ReservacionCliente::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[ResponsablesNegocios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResponsablesNegocios()
    {
        return $this->hasMany(ResponsablesNegocio::className(), ['id_negocio' => 'id']);
    }

    /**
     * Gets query for [[TipoServicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoServicios()
    {
        return $this->hasMany(TipoServicio::className(), ['id_negocio' => 'id']);
    }
}
