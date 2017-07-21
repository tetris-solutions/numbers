<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_WeightedSum_Parsable_Summable;

return new class extends Source_FloatParser_WeightedSum_Parsable_Summable {
	public $id = "averageposition";
	public $metric = "averageposition";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["AveragePosition"];
	public $property = "AveragePosition";
	public $type = "decimal";
	public $weightMetric = "impressions";
	public $inferred_from = ["impressions"];
};
