<?php

namespace backend\api\v1;

use tecnocen\roa\urlRules\SingleRecord as SingleRecordUrlRule;

class Version extends \tecnocen\roa\modules\ApiVersion {
	/**
	 * @inheritdoc
	 */
	public $resources = [
		'perfil'   => [
			'class'   => \backend\api\v1\resources\PerfilResource::class,
		],
		'negocios'   => [
			'class'   => \backend\api\v1\resources\NegocioResource::class,
		],
		'responsables-negocio'   => [
			'class'   => \backend\api\v1\resources\ResponsablesNegocioResource::class,
		],
		'licencia-negocio'   => [
			'class'   => \backend\api\v1\resources\LicenciasNegocioResource::class,
		],
		'horario-negocio'   => [
			'class'   => \backend\api\v1\resources\HorarioNegocioResource::class,
		],
		'horario-negocio-personalizado'   => [
			'class'   => \backend\api\v1\resources\HorarioNegocioPersonalizadoResource::class,
		],
		'direccion-negocio'   => [
			'class'   => \backend\api\v1\resources\DireccionNegocioResource::class,
		],
		'pagos-negocio'   => [
			'class'   => \backend\api\v1\resources\PagosNegocioResource::class,
		],
		'reservacion-cliente'   => [
			'class'   => \backend\api\v1\resources\ReservacionClienteResource::class,
		],
		'codigos-promocionales'   => [
			'class'   => \backend\api\v1\resources\CodigosPromocionalesResource::class,
		],
		'registro'   => [
			'class'   => \backend\api\v1\resources\RegistroResource::class,
		],
		'tipo-negocio'   => [
			'class'   => \backend\api\v1\resources\TipoNegocioResource::class,
		],
	];

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'backend\\api\\v1\\resources';
}