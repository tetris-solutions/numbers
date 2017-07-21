<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecost";
	public $metric = "averagecost";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["AverageCost"];
	public $property = "AverageCost";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "interactions";
	public $inferred_from = ["cost","interactions"];
};
