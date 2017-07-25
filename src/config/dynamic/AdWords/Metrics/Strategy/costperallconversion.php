<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'allconversions';

	public $entity = 'Strategy';

	public $fields = [
	    "CostPerAllConversion"
	];

	public $id = 'costperallconversion';

	public $inferred_from = [
	    "cost",
	    "allconversions"
	];

	public $metric = 'costperallconversion';

	public $platform = 'adwords';

	public $property = 'CostPerAllConversion';

	public $report = 'BID_GOAL_PERFORMANCE_REPORT';

	public $type = 'currency';
};
