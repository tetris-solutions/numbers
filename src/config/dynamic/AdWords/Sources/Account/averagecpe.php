<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'cost';

	public $divisorMetric = 'engagements';

	public $entity = 'Account';

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

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'currency';
};
