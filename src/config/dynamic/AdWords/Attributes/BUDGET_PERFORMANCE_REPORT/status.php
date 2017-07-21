<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "status";
	public $property = "BudgetStatus";
	public $is_filter = true;
	public $type = "budgetstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"ENABLED":"Enabled","REMOVED":"Removed","UNKNOWN":"unknown"};
	public $platform = "adwords";
	public $raw_property = "BudgetStatus";
};
