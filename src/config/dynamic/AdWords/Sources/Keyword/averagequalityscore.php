<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_WeightedSum_Parsable_Summable;

return new class extends FloatParser_WeightedSum_Parsable_Summable {
	public $id = "averagequalityscore";
	public $metric = "averagequalityscore";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["QualityScore"];
	public $property = "QualityScore";
	public $type = "decimal";
	public $weightMetric = "impressions";
	public $inferred_from = ["impressions"];
};
