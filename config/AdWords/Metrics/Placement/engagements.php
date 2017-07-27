<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Placement';

	public $fields = [
	    "Engagements"
	];

	public $id = 'engagements';

	public $metric = 'engagements';

	public $platform = 'adwords';

	public $property = 'Engagements';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'integer';
};
