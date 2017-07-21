<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "dayofweek";
	public $property = "DayOfWeek";
	public $is_filter = true;
	public $type = "dayofweek";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"MONDAY":"Monday","TUESDAY":"Tuesday","WEDNESDAY":"Wednesday","THURSDAY":"Thursday","FRIDAY":"Friday","SATURDAY":"Saturday","SUNDAY":"Sunday"};
	public $incompatible = ["AverageFrequency","ImpressionReach"];
	public $platform = "adwords";
	public $raw_property = "DayOfWeek";
};
