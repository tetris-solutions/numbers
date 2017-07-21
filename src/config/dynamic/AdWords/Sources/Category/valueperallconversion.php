<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "valueperallconversion";
	public $metric = "valueperallconversion";
	public $entity = "Category";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_CATEGORY_REPORT";
	public $fields = ["ValuePerAllConversion"];
	public $property = "ValuePerAllConversion";
	public $type = "decimal";
	public $dividendMetric = "allconversionvalue";
	public $divisorMetric = "allconversions";
	public $inferred_from = ["allconversionvalue","allconversions"];
};
