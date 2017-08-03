<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Segment';

	public $id = 'monthofyear';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'MonthOfYear';

	public $type = 'monthofyear';

	public $values = [
	    "JANUARY" => "January",
	    "FEBRUARY" => "February",
	    "MARCH" => "March",
	    "APRIL" => "April",
	    "MAY" => "May",
	    "JUNE" => "June",
	    "JULY" => "July",
	    "AUGUST" => "August",
	    "SEPTEMBER" => "September",
	    "OCTOBER" => "October",
	    "NOVEMBER" => "November",
	    "DECEMBER" => "December"
	];
};
