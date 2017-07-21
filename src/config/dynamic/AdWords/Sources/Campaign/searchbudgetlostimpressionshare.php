<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_LostImpressionShareSum_Parsable_Summable {
	public $id = "searchbudgetlostimpressionshare";
	public $metric = "searchbudgetlostimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $property = "SearchBudgetLostImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["SearchRankLostImpressionShare","SearchImpressionShare"];
	public $fields = ["SearchBudgetLostImpressionShare","SearchRankLostImpressionShare","SearchImpressionShare"];
	public $impressionShareMetric = "searchimpressionshare";
	public $impressionsMetric = "impressions";
	public $inferred_from = ["searchimpressionshare","impressions"];
};
