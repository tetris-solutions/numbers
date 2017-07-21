<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_ImpressionShareSum_Parsable_Summable {
	public $id = "searchimpressionshare";
	public $metric = "searchimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $property = "SearchImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["SearchBudgetLostImpressionShare","SearchRankLostImpressionShare"];
	public $fields = ["SearchImpressionShare","SearchBudgetLostImpressionShare","SearchRankLostImpressionShare"];
	public $impressionsMetric = "impressions";
	public $inferred_from = ["impressions"];
};
