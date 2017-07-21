<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'adgroupstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdGroupStatus';

	public $type = 'adgroupstatus';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "ENABLED" => "enabled",
	    "PAUSED" => "paused",
	    "REMOVED" => "removed"
	];
};
