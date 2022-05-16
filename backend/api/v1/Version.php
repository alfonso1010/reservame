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
	];

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'backend\\api\\v1\\resources';
}