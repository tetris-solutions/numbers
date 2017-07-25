<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'videoviews';

	public $entity = 'Budget';

	public $fields = [
	    "AverageCpv"
	];

	public $id = 'averagecpv';

	public $inferred_from = [
	    "cost",
	    "videoviews"
	];

	public $metric = 'averagecpv';

	public $platform = 'adwords';

	public $property = 'AverageCpv';

	public $report = 'BUDGET_PERFORMANCE_REPORT';

	public $type = 'currency';
};
