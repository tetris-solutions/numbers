<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_ComplexValueParser_Parsable;

return new class extends Metric_ComplexValueParser_Parsable {

	public $entity = 'Account';

	public $fields = [
	    "SearchExactMatchImpressionShare"
	];

	public $id = 'searchexactmatchimpressionshare';

	public $metric = 'searchexactmatchimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchExactMatchImpressionShare';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'special';
};
