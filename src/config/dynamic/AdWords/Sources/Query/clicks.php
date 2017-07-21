<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {

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
