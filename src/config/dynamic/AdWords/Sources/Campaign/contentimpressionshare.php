<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_TriangulationParser_ImpressionShareSum_Parsable_Summable;

return new class extends Source_TriangulationParser_ImpressionShareSum_Parsable_Summable {
	public $id = "contentimpressionshare";
	public $metric = "contentimpressionshare";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $property = "ContentImpressionShare";
	public $type = "special";
	public $auxiliaryMetrics = ["ContentBudgetLostImpressionShare","ContentRankLostImpressionShare"];
	public $fields = ["ContentImpressionShare","ContentBudgetLostImpressionShare","ContentRankLostImpressionShare"];
	public $impressionsMetric = "impressions";
	public $inferred_from = ["impressions"];
};
