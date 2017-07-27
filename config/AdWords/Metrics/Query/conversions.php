<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Query';

	public $fields = [
	    "Conversions"
	];

	public $id = 'conversions';

	public $metric = 'conversions';

	public $platform = 'adwords';

	public $property = 'Conversions';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'decimal';
};
