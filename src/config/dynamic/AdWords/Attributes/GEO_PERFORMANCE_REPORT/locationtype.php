<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'locationtype';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'LocationType';

	public $type = 'geotargettype';

	public $values = [
	    "AREA_OF_INTEREST" => "Location of interest",
	    "LOCATION_OF_PRESENCE" => "Physical location",
	    "UNKNOWN" => "unknown"
	];
};
