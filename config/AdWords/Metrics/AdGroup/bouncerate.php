<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_Parsable;

return new class extends Metric_PercentParser_Parsable {

	public $entity = 'AdGroup';

	public $fields = [
	    "BounceRate"
	];

	public $id = 'bouncerate';

	public $metric = 'bouncerate';

	public $platform = 'adwords';

	public $property = 'BounceRate';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
