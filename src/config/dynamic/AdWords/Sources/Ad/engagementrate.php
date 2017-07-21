<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {
	public $id = "engagementrate";
	public $metric = "engagementrate";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["EngagementRate"];
	public $property = "EngagementRate";
	public $type = "percentage";
	public $dividendMetric = "engagements";
	public $divisorMetric = "impressions";
	public $inferred_from = ["engagements","impressions"];
};
