<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'engagements';

	public $divisorMetric = 'impressions';

	public $entity = 'Audience';

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

	public $report = 'AUDIENCE_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
