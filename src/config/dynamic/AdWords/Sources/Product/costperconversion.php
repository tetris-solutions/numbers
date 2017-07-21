<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "costperconversion";
	public $metric = "costperconversion";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["CostPerConversion"];
	public $property = "CostPerConversion";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "conversions";
	public $inferred_from = ["cost","conversions"];
};
