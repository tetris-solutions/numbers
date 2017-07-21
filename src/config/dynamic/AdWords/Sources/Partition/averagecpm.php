<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_RatioSum_Parsable_Summable;

return new class extends Source_FloatParser_RatioSum_Parsable_Summable {
	public $id = "averagecpm";
	public $metric = "averagecpm";
	public $entity = "Partition";
	public $platform = "adwords";
	public $report = "PRODUCT_PARTITION_REPORT";
	public $fields = ["AverageCpm"];
	public $property = "AverageCpm";
	public $type = "currency";
	public $dividendMetric = "cost";
	public $divisorMetric = "impressions";
	public $inferred_from = ["cost","impressions"];
};
