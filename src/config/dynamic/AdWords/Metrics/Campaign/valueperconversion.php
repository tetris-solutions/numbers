<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'conversionvalue';

	public $divisorMetric = 'conversions';

	public $entity = 'Campaign';

	public $fields = [
	    "ValuePerConversion"
	];

	public $id = 'valueperconversion';

	public $inferred_from = [
	    "conversionvalue",
	    "conversions"
	];

	public $metric = 'valueperconversion';

	public $platform = 'adwords';

	public $property = 'ValuePerConversion';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
