<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'status';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'BudgetStatus';

	public $type = 'budgetstatus';

	public $values = [
	    "ENABLED" => "Enabled",
	    "REMOVED" => "Removed",
	    "UNKNOWN" => "unknown"
	];
};
