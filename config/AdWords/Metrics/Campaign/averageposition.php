<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_WeightedSum_Parsable_Summable;

return new class extends Metric_FloatParser_WeightedSum_Parsable_Summable {

	public $entity = 'Campaign';

	public $fields = [
	    "AveragePosition"
	];

	public $id = 'averageposition';

	public $inferred_from = [
	    "impressions"
	];

	public $metric = 'averageposition';

	public $platform = 'adwords';

	public $property = 'AveragePosition';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'decimal';

	public $weightMetric = 'impressions';
};
