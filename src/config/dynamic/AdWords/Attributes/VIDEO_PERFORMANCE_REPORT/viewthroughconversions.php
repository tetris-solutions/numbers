<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "viewthroughconversions";
	public $property = "ViewThroughConversions";
	public $is_filter = true;
	public $type = "integer";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ClickType"];
	public $platform = "adwords";
	public $raw_property = "ViewThroughConversions";
};
