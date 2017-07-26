<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Strategy';

	public $fields = [
	    "ConversionValue"
	];

	public $id = 'conversionvalue';

	public $metric = 'conversionvalue';

	public $platform = 'adwords';

	public $property = 'ConversionValue';

	public $report = 'BID_GOAL_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
