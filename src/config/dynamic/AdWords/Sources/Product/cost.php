<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_FloatParser_TrivialSum_Parsable_Summable;

return new class extends Source_FloatParser_TrivialSum_Parsable_Summable {
	public $id = "cost";
	public $metric = "cost";
	public $entity = "Product";
	public $platform = "adwords";
	public $report = "SHOPPING_PERFORMANCE_REPORT";
	public $fields = ["Cost"];
	public $property = "Cost";
	public $type = "currency";
};
