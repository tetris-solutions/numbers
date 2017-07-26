<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_Parsable;

return new class extends Metric_FloatParser_Parsable {

	public $entity = 'AdGroup';

	public $fields = [
	    "ActiveViewCpm"
	];

	public $id = 'activeviewcpm';

	public $metric = 'activeviewcpm';

	public $platform = 'adwords';

	public $property = 'ActiveViewCpm';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'currency';
};
