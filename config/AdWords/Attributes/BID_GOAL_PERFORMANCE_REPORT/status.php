<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Attribute';

	public $id = 'status';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'Status';

	public $type = 'biddingstrategystatus';

	public $values = [
	    "ENABLED" => "Enabled",
	    "REMOVED" => "Removed",
	    "UNKNOWN" => "unknown"
	];
};
