<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'engagements';

	public $divisorMetric = 'impressions';

	public $entity = 'Budget';

	public $fields = [
	    "EngagementRate"
	];

	public $id = 'engagementrate';

	public $inferred_from = [
	    "engagements",
	    "impressions"
	];

	public $metric = 'engagementrate';

	public $platform = 'adwords';

	public $property = 'EngagementRate';

	public $report = 'BUDGET_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
