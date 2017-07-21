<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_Parsable;

return new class extends Source_FloatParser_Parsable {

	public $entity = 'Account';

	public $fields = [
	    "ActiveViewCpm"
	];

	public $id = 'activeviewcpm';

	public $metric = 'activeviewcpm';

	public $platform = 'adwords';

	public $property = 'ActiveViewCpm';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'currency';
};
