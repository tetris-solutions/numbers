<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "allconversionvalue";
	public $property = "AllConversionValue";
	public $is_filter = true;
	public $type = "decimal";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["HourOfDay"];
	public $platform = "adwords";
	public $raw_property = "AllConversionValue";
};
