<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Attribute';

	public $id = 'creativestatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CreativeStatus';

	public $type = 'status';

	public $values = [
	    "ENABLED" => "enabled",
	    "PAUSED" => "paused",
	    "DISABLED" => "disabled"
	];
};
