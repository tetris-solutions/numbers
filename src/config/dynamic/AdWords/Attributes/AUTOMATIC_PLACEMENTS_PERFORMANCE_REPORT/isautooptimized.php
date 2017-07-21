<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "isautooptimized";
	public $property = "IsAutoOptimized";
	public $is_filter = true;
	public $type = "enum";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"TRUE":"Auto-optimized","FALSE":"Standard"};
	public $platform = "adwords";
	public $raw_property = "IsAutoOptimized";
};
