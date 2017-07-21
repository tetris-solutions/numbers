<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_RatioSum_Parsable_Summable;

return new class extends FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecpm";
	public $metric = "averagecpm";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["AverageCpm"];
	public $property = "AverageCpm";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "impressions";
	public $inferred_from = ["cost","impressions"];
};
