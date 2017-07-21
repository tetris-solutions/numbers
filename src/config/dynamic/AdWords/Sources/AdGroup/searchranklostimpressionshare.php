<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends TriangulationParser_LostImpressionShareSum_Parsable_Summable {
	public $id = "searchranklostimpressionshare";
	public $metric = "searchranklostimpressionshare";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $property = "SearchRankLostImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["SearchImpressionShare"];
	public $fields = ["SearchRankLostImpressionShare","SearchImpressionShare"];
	public $impressionShareMetric = "searchimpressionshare";
	public $impressionsMetric = "impressions";
	public $inferred_from = ["searchimpressionshare","impressions"];
};
