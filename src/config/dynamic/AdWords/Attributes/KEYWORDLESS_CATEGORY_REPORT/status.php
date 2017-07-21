<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "status";
	public $property = "AdGroupStatus";
	public $is_filter = true;
	public $type = "adgroupstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","ENABLED":"enabled","PAUSED":"paused","REMOVED":"removed"};
	public $platform = "adwords";
	public $raw_property = "AdGroupStatus";
};
