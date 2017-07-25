<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_LostImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "SearchImpressionShare"
	];

	public $entity = 'Keyword';

	public $fields = [
	    "SearchRankLostImpressionShare",
	    "SearchImpressionShare"
	];

	public $id = 'searchranklostimpressionshare';

	public $impressionShareMetric = 'searchimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "searchimpressionshare",
	    "impressions"
	];

	public $metric = 'searchranklostimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchRankLostImpressionShare';

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'special';
};
