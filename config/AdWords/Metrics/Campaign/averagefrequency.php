<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'impressions';

	public $divisorMetric = 'impressionreach';

	public $entity = 'Campaign';

	public $fields = [
	    "AverageFrequency"
	];

	public $id = 'averagefrequency';

	public $inferred_from = [
	    "impressions",
	    "impressionreach"
	];

	public $metric = 'averagefrequency';

	public $platform = 'adwords';

	public $property = 'AverageFrequency';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'decimal';
};
