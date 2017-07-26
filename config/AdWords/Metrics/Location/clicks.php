<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Location';

	public $fields = [
	    "Clicks"
	];

	public $id = 'clicks';

	public $metric = 'clicks';

	public $platform = 'adwords';

	public $property = 'Clicks';

	public $report = 'GEO_PERFORMANCE_REPORT';

	public $type = 'integer';
};
