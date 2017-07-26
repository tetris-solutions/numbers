<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'conversions';

	public $entity = 'Placement';

	public $fields = [
	    "CostPerConversion"
	];

	public $id = 'costperconversion';

	public $inferred_from = [
	    "cost",
	    "conversions"
	];

	public $metric = 'costperconversion';

	public $platform = 'adwords';

	public $property = 'CostPerConversion';

	public $report = 'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT';

	public $type = 'currency';
};
