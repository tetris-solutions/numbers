<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'interactions';

	public $entity = 'Ad';

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

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'currency';
};
