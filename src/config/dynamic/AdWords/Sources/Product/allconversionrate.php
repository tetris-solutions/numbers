<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_RatioSum_Parsable_Summable;

return new class extends PercentParser_RatioSum_Parsable_Summable {
	public $id = "allconversionrate";
	public $metric = "allconversionrate";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["AllConversionRate"];
	public $property = "AllConversionRate";
	public $type = "percentage";
	public $dividendMetric = "allconversions";
	public $divisorMetric = "clicks";
	public $inferred_from = ["allconversions","clicks"];
};
