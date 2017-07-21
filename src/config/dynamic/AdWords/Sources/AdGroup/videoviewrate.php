<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {
	public $id = "videoviewrate";
	public $metric = "videoviewrate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["VideoViewRate"];
	public $property = "VideoViewRate";
	public $type = "percentage";
	public $dividendMetric = "videoviews";
	public $divisorMetric = "impressions";
	public $inferred_from = ["videoviews","impressions"];
};
