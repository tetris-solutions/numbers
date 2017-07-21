<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "desktopbidmodifier";
	public $property = "AdGroupDesktopBidModifier";
	public $is_filter = true;
	public $type = "decimal";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $platform = "adwords";
	public $raw_property = "AdGroupDesktopBidModifier";
};
