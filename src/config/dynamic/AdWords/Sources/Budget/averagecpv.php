<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecpv";
	public $metric = "averagecpv";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["AverageCpv"];
	public $property = "AverageCpv";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "videoviews";
	public $inferred_from = ["cost","videoviews"];
};
