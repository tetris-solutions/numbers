<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversions';

	public $divisorMetric = 'clicks';

	public $entity = 'Query';

	public $fields = [
	    "ConversionRate"
	];

	public $id = 'conversionrate';

	public $inferred_from = [
	    "conversions",
	    "clicks"
	];

	public $metric = 'conversionrate';

	public $platform = 'adwords';

	public $property = 'ConversionRate';

	public $report = 'KEYWORDLESS_QUERY_REPORT';

	public $type = 'percentage';
};
