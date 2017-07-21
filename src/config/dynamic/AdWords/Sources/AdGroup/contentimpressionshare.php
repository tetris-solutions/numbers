<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_ImpressionShareSum_Parsable_Summable {
	public $id = "contentimpressionshare";
	public $metric = "contentimpressionshare";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $property = "ContentImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["ContentRankLostImpressionShare"];
	public $fields = ["ContentImpressionShare","ContentRankLostImpressionShare"];
	public $impressionsMetric = "impressions";
	public $inferred_from = ["impressions"];
};
