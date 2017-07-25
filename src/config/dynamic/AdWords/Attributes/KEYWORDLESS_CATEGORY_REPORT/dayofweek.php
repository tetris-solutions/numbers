<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'dayofweek';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'DayOfWeek';

	public $type = 'dayofweek';

	public $values = [
	    "MONDAY" => "Monday",
	    "TUESDAY" => "Tuesday",
	    "WEDNESDAY" => "Wednesday",
	    "THURSDAY" => "Thursday",
	    "FRIDAY" => "Friday",
	    "SATURDAY" => "Saturday",
	    "SUNDAY" => "Sunday"
	];
};
