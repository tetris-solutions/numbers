<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "bidmodifier";
	public $property = "BidModifier";
	public $is_filter = true;
	public $type = "percentage";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = true;
	public $platform = "adwords";
	public $raw_property = "BidModifier";
};
