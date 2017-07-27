<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'engagements';

	public $entity = 'AdGroup';

	public $fields = [
	    "AverageCpe"
	];

	public $id = 'averagecpe';

	public $inferred_from = [
	    "cost",
	    "engagements"
	];

	public $metric = 'averagecpe';

	public $platform = 'adwords';

	public $property = 'AverageCpe';

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'currency';
};
