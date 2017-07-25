<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Metric_IntegerParser_TrivialSum_Parsable_Summable {

	public $entity = 'Query';

	public $fields = [
	    "Clicks"
	];

	public $id = 'clicks';

	public $metric = 'clicks';

	public $platform = 'adwords';

	public $property = 'Clicks';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'integer';
};
