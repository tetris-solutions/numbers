<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "averagecpm";
	public $property = "AverageCpm";
	public $is_filter = true;
	public $type = "currency";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ConversionCategoryName","ConversionTypeName","ExternalConversionSource"];
	public $platform = "adwords";
	public $raw_property = "AverageCpm";
};
