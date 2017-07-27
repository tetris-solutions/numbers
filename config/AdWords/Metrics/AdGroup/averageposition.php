<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_WeightedSum_Parsable_Summable;

return new class extends Metric_FloatParser_WeightedSum_Parsable_Summable {

	public $entity = 'AdGroup';

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

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'decimal';

	public $weightMetric = 'impressions';
};
