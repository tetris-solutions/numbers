<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'productcondition';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ProductCondition';

	public $type = 'shoppingproductcondition';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "NEW" => "New",
	    "REFURBISHED" => "Refurbished",
	    "USED" => "Used"
	];
};
