<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "adformat";
	public $property = "AdFormat";
	public $is_filter = true;
	public $type = "adformat";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","TEXT":"text","IMAGE":"image","DYNAMIC_IMAGE":"dynamic_image","FLASH":"flash","VIDEO":"video","HTML":"html","AUDIO":"audio","COMPOSITE":"composite","PRINT":"print"};
	public $platform = "adwords";
	public $raw_property = "AdFormat";
};
