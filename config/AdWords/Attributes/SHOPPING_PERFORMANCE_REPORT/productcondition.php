<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Segment';

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
