<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_RatioSum_Parsable_Summable;

return new class extends FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecost";
	public $metric = "averagecost";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["AverageCost"];
	public $property = "AverageCost";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "interactions";
	public $inferred_from = ["cost","interactions"];
};
