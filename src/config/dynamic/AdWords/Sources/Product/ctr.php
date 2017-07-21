<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_RatioSum_Parsable_Summable;

return new class extends PercentParser_RatioSum_Parsable_Summable {
	public $id = "ctr";
	public $metric = "ctr";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["Ctr"];
	public $property = "Ctr";
	public $type = "percentage";
	public $dividendMetric = "clicks";
	public $divisorMetric = "impressions";
	public $inferred_from = ["clicks","impressions"];
};
