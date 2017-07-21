<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversions';

	public $divisorMetric = 'clicks';

	public $entity = 'Budget';

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

	public $report = 'BUDGET_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
