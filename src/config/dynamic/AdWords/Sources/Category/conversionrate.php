<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {
	public $id = "conversionrate";
	public $metric = "conversionrate";
	public $entity = "Category";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_CATEGORY_REPORT";
	public $fields = ["ConversionRate"];
	public $property = "ConversionRate";
	public $type = "percentage";
	public $dividendMetric = "conversions";
	public $divisorMetric = "clicks";
	public $inferred_from = ["conversions","clicks"];
};
