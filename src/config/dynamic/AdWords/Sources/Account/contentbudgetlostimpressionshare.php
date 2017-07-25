<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "ContentRankLostImpressionShare",
	    "ContentImpressionShare"
	];

	public $entity = 'Account';

	public $fields = [
	    "ContentBudgetLostImpressionShare",
	    "ContentRankLostImpressionShare",
	    "ContentImpressionShare"
	];

	public $id = 'contentbudgetlostimpressionshare';

	public $impressionShareMetric = 'contentimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "contentimpressionshare",
	    "impressions"
	];

	public $metric = 'contentbudgetlostimpressionshare';

	public $platform = 'adwords';

	public $property = 'ContentBudgetLostImpressionShare';

	public $report = 'ACCOUNT_PERFORMANCE_REPORT';

	public $type = 'special';
};
