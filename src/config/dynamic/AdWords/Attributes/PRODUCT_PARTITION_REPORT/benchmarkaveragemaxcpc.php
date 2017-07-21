<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "benchmarkaveragemaxcpc";
	public $property = "BenchmarkAverageMaxCpc";
	public $is_filter = true;
	public $type = "currency";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ClickType","Device"];
	public $platform = "adwords";
	public $raw_property = "BenchmarkAverageMaxCpc";
};
