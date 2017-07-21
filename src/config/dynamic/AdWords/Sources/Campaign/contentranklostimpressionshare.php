<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable {
	public $id = "contentranklostimpressionshare";
	public $metric = "contentranklostimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $property = "ContentRankLostImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["ContentBudgetLostImpressionShare","ContentImpressionShare"];
	public $fields = ["ContentRankLostImpressionShare","ContentBudgetLostImpressionShare","ContentImpressionShare"];
	public $impressionShareMetric = "contentimpressionshare";
	public $impressionsMetric = "impressions";
	public $inferred_from = ["contentimpressionshare","impressions"];
};
