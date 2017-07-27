<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'servingstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ServingStatus';

	public $type = 'servingstatus';

	public $values = [
	    "SERVING" => "eligible",
	    "NONE" => "none",
	    "ENDED" => "ended",
	    "PENDING" => "pending",
	    "SUSPENDED" => "suspended"
	];
};
