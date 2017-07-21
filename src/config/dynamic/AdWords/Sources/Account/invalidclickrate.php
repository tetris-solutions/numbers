<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\PercentParser_RatioSum_Parsable_Summable;

return new class extends PercentParser_RatioSum_Parsable_Summable {
	public $id = "invalidclickrate";
	public $metric = "invalidclickrate";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["InvalidClickRate"];
	public $property = "InvalidClickRate";
	public $type = "percentage";
	public $dividendMetric = "invalidclicks";
	public $divisorMetric = "clicks";
	public $inferred_from = ["invalidclicks","clicks"];
};
