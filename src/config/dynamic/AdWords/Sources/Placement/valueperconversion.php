<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "valueperconversion";
	public $metric = "valueperconversion";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["ValuePerConversion"];
	public $property = "ValuePerConversion";
	public $type = "decimal";
	public $dividendMetric = "conversionvalue";
	public $divisorMetric = "conversions";
	public $inferred_from = ["conversionvalue","conversions"];
};
