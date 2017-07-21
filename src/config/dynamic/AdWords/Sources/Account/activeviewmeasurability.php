<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "activeviewmeasurability";
	public $metric = "activeviewmeasurability";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["ActiveViewMeasurability"];
	public $property = "ActiveViewMeasurability";
	public $type = "decimal";
};
