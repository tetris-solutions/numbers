<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'engagements';

	public $entity = 'Campaign';

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

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'currency';
};
