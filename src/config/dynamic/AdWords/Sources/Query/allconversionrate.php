<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_PercentParser_RatioSum_Parsable_Summable;

return new class extends Source_PercentParser_RatioSum_Parsable_Summable {
	public $id = "allconversionrate";
	public $metric = "allconversionrate";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["AllConversionRate"];
	public $property = "AllConversionRate";
	public $type = "percentage";
	public $dividendMetric = "allconversions";
	public $divisorMetric = "clicks";
	public $inferred_from = ["allconversions","clicks"];
};
