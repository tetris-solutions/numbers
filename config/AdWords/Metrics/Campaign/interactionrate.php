<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_PercentParser_RatioSum_Parsable_Summable;

return new class extends Metric_PercentParser_RatioSum_Parsable_Summable {

	public $dividendMetric = 'interactions';

	public $divisorMetric = 'impressions';

	public $entity = 'Campaign';

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

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'percentage';
};
