<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Placement';

	public $fields = [
	    "AllConversions"
	];

	public $id = 'allconversions';

	public $metric = 'allconversions';

	public $platform = 'adwords';

	public $property = 'AllConversions';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
