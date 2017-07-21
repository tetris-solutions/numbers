<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "offlineinteractionrate";
	public $metric = "offlineinteractionrate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["OfflineInteractionRate"];
	public $property = "OfflineInteractionRate";
	public $type = "decimal";
	public $dividendMetric = "numofflineinteractions";
	public $divisorMetric = "numofflineimpressions";
	public $inferred_from = ["numofflineinteractions","numofflineimpressions"];
};
