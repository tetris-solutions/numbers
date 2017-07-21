<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\TriangulationParser_LostImpressionShareSum_Parsable_Summable;

return new class extends TriangulationParser_LostImpressionShareSum_Parsable_Summable {
	public $id = "searchranklostimpressionshare";
	public $metric = "searchranklostimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $property = "SearchRankLostImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["SearchBudgetLostImpressionShare","SearchImpressionShare"];
	public $fields = ["SearchRankLostImpressionShare","SearchBudgetLostImpressionShare","SearchImpressionShare"];
	public $impressionShareMetric = "searchimpressionshare";
	public $impressionsMetric = "impressions";
	public $inferred_from = ["searchimpressionshare","impressions"];
};
