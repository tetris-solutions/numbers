<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'status';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'Status';

	public $type = 'userstatus';

	public $values = [
	    "ENABLED" => "enabled",
	    "REMOVED" => "removed",
	    "PAUSED" => "paused"
	];
};
