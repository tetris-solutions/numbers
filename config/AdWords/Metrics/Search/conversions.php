<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Search';

	public $fields = [
	    "Conversions"
	];

	public $id = 'conversions';

	public $metric = 'conversions';

	public $platform = 'adwords';

	public $property = 'Conversions';

	public $report = 'SEARCH_QUERY_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
