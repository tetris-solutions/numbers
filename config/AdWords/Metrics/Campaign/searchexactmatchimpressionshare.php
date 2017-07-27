<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_ComplexValueParser_Parsable;

return new class extends Metric_ComplexValueParser_Parsable {

	public $entity = 'Campaign';

	public $fields = [
	    "SearchExactMatchImpressionShare"
	];

	public $id = 'searchexactmatchimpressionshare';

	public $metric = 'searchexactmatchimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchExactMatchImpressionShare';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'special';
};
