<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "ContentBudgetLostImpressionShare",
	    "ContentRankLostImpressionShare"
	];

	public $entity = 'Account';

	public $fields = [
	    "ContentImpressionShare",
	    "ContentBudgetLostImpressionShare",
	    "ContentRankLostImpressionShare"
	];

	public $id = 'contentimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "impressions"
	];

	public $metric = 'contentimpressionshare';

	public $platform = 'adwords';

	public $property = 'ContentImpressionShare';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'special';
};
