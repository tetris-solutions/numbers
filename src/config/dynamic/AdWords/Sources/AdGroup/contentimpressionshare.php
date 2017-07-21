<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_ImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "ContentRankLostImpressionShare"
	];

	public $entity = 'AdGroup';

	public $fields = [
	    "ContentImpressionShare",
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

	public $report = 'ADGROUP_PERFORMANCE_REPORT';

	public $type = 'special';
};
