<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Source\Source_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_ImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [
	    "SearchRankLostImpressionShare"
	];

	public $entity = 'Keyword';

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

	public $report = 'KEYWORDS_PERFORMANCE_REPORT';

	public $type = 'special';
};
