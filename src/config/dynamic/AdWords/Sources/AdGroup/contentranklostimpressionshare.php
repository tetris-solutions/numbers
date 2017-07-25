<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "ContentImpressionShare"
	];

	public $entity = 'AdGroup';

	public $fields = [
	    "ContentRankLostImpressionShare",
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

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'special';
};
