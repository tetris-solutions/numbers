<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'interactions';

	public $entity = 'AdGroup';

	public $fields = [
	    "AverageCost"
	];

	public $id = 'averagecost';

	public $inferred_from = [
	    "cost",
	    "interactions"
	];

	public $metric = 'averagecost';

	public $platform = 'adwords';

	public $property = 'AverageCost';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'currency';
};
