<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "impressionreach";
	public $property = "ImpressionReach";
	public $is_filter = true;
	public $type = "special";
	public $is_metric = true;
	public $is_dimension = false;
	public $is_percentage = false;
	public $incompatible = ["ClickType","ConversionCategoryName","ConversionTrackerId","ConversionTypeName","DayOfWeek","Device","ExternalConversionSource","HourOfDay","Quarter","Slot","Year"];
	public $platform = "adwords";
	public $raw_property = "ImpressionReach";
};
