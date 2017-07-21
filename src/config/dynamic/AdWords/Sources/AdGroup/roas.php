<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_RatioParser_RatioSum_Parsable_Summable;

return new class extends Source_RatioParser_RatioSum_Parsable_Summable {
	public $id = "roas";
	public $metric = "roas";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $property = "Roas";
	public $type = "currency";
	public $dividendProperty = "ConversionValue";
	public $divisorProperty = "Cost";
	public $fields = ["ConversionValue","Cost"];
	public $dividendMetric = "conversionvalue";
	public $divisorMetric = "cost";
	public $inferred_from = ["conversionvalue","cost"];
};
