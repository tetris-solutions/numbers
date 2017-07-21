<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "monthofyear";
	public $property = "MonthOfYear";
	public $is_filter = true;
	public $type = "monthofyear";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"JANUARY":"January","FEBRUARY":"February","MARCH":"March","APRIL":"April","MAY":"May","JUNE":"June","JULY":"July","AUGUST":"August","SEPTEMBER":"September","OCTOBER":"October","NOVEMBER":"November","DECEMBER":"December"};
	public $platform = "adwords";
	public $raw_property = "MonthOfYear";
};
