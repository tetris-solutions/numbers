<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Placement';

	public $fields = [
	    "AllConversionValue"
	];

	public $id = 'allconversionvalue';

	public $metric = 'allconversionvalue';

	public $platform = 'adwords';

	public $property = 'AllConversionValue';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
