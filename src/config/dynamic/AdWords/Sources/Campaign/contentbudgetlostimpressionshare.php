<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends TriangulationParser_LostImpressionShareSum_Parsable_Summable {
	public $id = "contentbudgetlostimpressionshare";
	public $metric = "contentbudgetlostimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $property = "ContentBudgetLostImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["ContentRankLostImpressionShare","ContentImpressionShare"];
	public $fields = ["ContentBudgetLostImpressionShare","ContentRankLostImpressionShare","ContentImpressionShare"];
	public $impressionShareMetric = "contentimpressionshare";
	public $impressionsMetric = "impressions";
	public $inferred_from = ["contentimpressionshare","impressions"];
};
