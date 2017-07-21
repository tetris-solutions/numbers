<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecpc";
	public $metric = "averagecpc";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["AverageCpc"];
	public $property = "AverageCpc";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "clicks";
	public $inferred_from = ["cost","clicks"];
};
