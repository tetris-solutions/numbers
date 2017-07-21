<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "locationtype";
	public $property = "LocationType";
	public $is_filter = true;
	public $type = "geotargettype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"AREA_OF_INTEREST":"Location of interest","LOCATION_OF_PRESENCE":"Physical location","UNKNOWN":"unknown"};
	public $platform = "adwords";
	public $raw_property = "LocationType";
};
