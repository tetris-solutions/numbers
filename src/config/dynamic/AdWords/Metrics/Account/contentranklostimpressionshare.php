<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "ContentBudgetLostImpressionShare",
	    "ContentImpressionShare"
	];

	public $entity = 'Account';

	public $fields = [
	    "ContentRankLostImpressionShare",
	    "ContentBudgetLostImpressionShare",
	    "ContentImpressionShare"
	];

	public $id = 'contentranklostimpressionshare';

	public $impressionShareMetric = 'contentimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "contentimpressionshare",
	    "impressions"
	];

	public $metric = 'contentranklostimpressionshare';

	public $platform = 'adwords';

	public $property = 'ContentRankLostImpressionShare';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'special';
};
