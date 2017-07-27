<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "SearchBudgetLostImpressionShare",
	    "SearchRankLostImpressionShare"
	];

	public $entity = 'Campaign';

	public $fields = [
	    "SearchImpressionShare",
	    "SearchBudgetLostImpressionShare",
	    "SearchRankLostImpressionShare"
	];

	public $id = 'searchimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "impressions"
	];

	public $metric = 'searchimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchImpressionShare';

	public $report = 'CAMPAIGN_PERFORMANCE_REPORT';

	public $type = 'special';
};
