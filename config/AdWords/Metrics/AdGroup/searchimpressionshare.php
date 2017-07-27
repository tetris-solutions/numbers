<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Metric\Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "SearchRankLostImpressionShare"
	];

	public $entity = 'AdGroup';

	public $fields = [
	    "SearchImpressionShare",
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

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'special';
};
