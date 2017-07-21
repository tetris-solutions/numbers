<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "targetroasbidfloor";
	public $property = "TargetRoasBidFloor";
	public $is_filter = true;
	public $type = "currency";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $platform = "adwords";
	public $raw_property = "TargetRoasBidFloor";
};
