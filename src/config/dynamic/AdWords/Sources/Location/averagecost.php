<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'interactions';

	public $entity = 'Location';

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

	public $report = 'GEO_PERFORMANCE_REPORT';

	public $type = 'currency';
};
