<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_FloatParser_RatioSum_Parsable_Summable;

return new class extends Metric_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'engagements';

	public $entity = 'Ad';

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

	public $report = 'AD_PERFORMANCE_REPORT';

	public $type = 'currency';
};
