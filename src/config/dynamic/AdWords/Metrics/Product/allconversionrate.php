<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'allconversions';

	public $divisorMetric = 'clicks';

	public $entity = 'Product';

	public $fields = [
	    "AllConversionRate"
	];

	public $id = 'allconversionrate';

	public $inferred_from = [
	    "allconversions",
	    "clicks"
	];

	public $metric = 'allconversionrate';

	public $platform = 'adwords';

	public $property = 'AllConversionRate';

	public $report = 'SHOPPING_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
