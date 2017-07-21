<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\FloatParser_TrivialSum_Parsable_Summable;

return new class extends FloatParser_TrivialSum_Parsable_Summable {
	public $id = "conversionvalue";
	public $metric = "conversionvalue";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["ConversionValue"];
	public $property = "ConversionValue";
	public $type = "decimal";
};
