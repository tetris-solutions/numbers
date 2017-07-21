<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_WeightedSum_Parsable_Summable;

return new class extends FloatParser_WeightedSum_Parsable_Summable {
	public $id = "averageposition";
	public $metric = "averageposition";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $fields = ["AveragePosition"];
	public $property = "AveragePosition";
	public $type = "decimal";
	public $weightMetric = "impressions";
	public $inferred_from = ["impressions"];
};
