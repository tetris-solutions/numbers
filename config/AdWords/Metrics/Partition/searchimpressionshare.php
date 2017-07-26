<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Metric\Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Metric_TriangulationParser_ImpressionShareSum_Parsable_Summable {

	public $auxiliaryMetrics = [

	];

	public $entity = 'Partition';

	public $fields = [
	    "SearchImpressionShare"
	];

	public $id = 'searchimpressionshare';

	public $impressionsMetric = 'impressions';

	public $inferred_from = [
	    "impressions"
	];

	public $metric = 'searchimpressionshare';

	public $platform = 'adwords';

	public $property = 'SearchImpressionShare';

	public $report = 'PRODUCT_PARTITION_REPORT';

	public $type = 'special';
};
