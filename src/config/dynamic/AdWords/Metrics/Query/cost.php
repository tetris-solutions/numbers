<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Metric_FloatParser_TrivialSum_Parsable_Summable {

	public $entity = 'Query';

	public $fields = [
	    "Cost"
	];

	public $id = 'cost';

	public $metric = 'cost';

	public $platform = 'adwords';

	public $property = 'Cost';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'currency';
};
