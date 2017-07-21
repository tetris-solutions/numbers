<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'impressions';

	public $entity = 'Location';

	public $fields = [
	    "AverageCpm"
	];

	public $id = 'averagecpm';

	public $inferred_from = [
	    "cost",
	    "impressions"
	];

	public $metric = 'averagecpm';

	public $platform = 'adwords';

	public $property = 'AverageCpm';

	public $report = 'GEO_PERFORMANCE_REPORT';

	public $type = 'currency';
};
