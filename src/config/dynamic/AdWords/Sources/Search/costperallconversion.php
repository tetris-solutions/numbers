<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "costperallconversion";
	public $metric = "costperallconversion";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["CostPerAllConversion"];
	public $property = "CostPerAllConversion";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "allconversions";
	public $inferred_from = ["cost","allconversions"];
};
