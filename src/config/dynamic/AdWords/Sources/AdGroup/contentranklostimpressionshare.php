<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends TriangulationParser_LostImpressionShareSum_Parsable_Summable {
	public $id = "contentranklostimpressionshare";
	public $metric = "contentranklostimpressionshare";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $property = "ContentRankLostImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["ContentImpressionShare"];
	public $fields = ["ContentRankLostImpressionShare","ContentImpressionShare"];
	public $impressionShareMetric = "contentimpressionshare";
	public $impressionsMetric = "impressions";
	public $inferred_from = ["contentimpressionshare","impressions"];
};
