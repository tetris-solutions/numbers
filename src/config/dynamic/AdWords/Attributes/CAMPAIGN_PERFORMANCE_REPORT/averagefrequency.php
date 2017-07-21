<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "averagefrequency";
	public $property = "AverageFrequency";
	public $is_filter = true;
	public $type = "decimal";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ClickType","ConversionCategoryName","ConversionTrackerId","ConversionTypeName","DayOfWeek","Device","ExternalConversionSource","HourOfDay","Quarter","Slot","Year"];
	public $platform = "adwords";
	public $raw_property = "AverageFrequency";
};
