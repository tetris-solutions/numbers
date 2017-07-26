<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "SearchRankLostImpressionShare",
	    "SearchImpressionShare"
	];

	public $entity = 'Campaign';

	public $fields = [
	    "SearchBudgetLostImpressionShare",
	    "SearchRankLostImpressionShare",
	    "SearchImpressionShare"
	];

	public $id = 'searchbudgetlostimpressionshare';

	public $impressionShareMetric = 'searchimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "searchimpressionshare",
	    "impressions"
	];

	public $metric = 'searchbudgetlostimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchBudgetLostImpressionShare';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'special';
};
