<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'interactions';

	public $divisorMetric = 'impressions';

	public $entity = 'Budget';

	public $fields = [
	    "InteractionRate"
	];

	public $id = 'interactionrate';

	public $inferred_from = [
	    "interactions",
	    "impressions"
	];

	public $metric = 'interactionrate';

	public $platform = 'adwords';

	public $property = 'InteractionRate';

	public $report = 'BUDGET_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
