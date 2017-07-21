<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "servingstatus";
	public $property = "ServingStatus";
	public $is_filter = true;
	public $type = "servingstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"SERVING":"eligible","NONE":"none","ENDED":"ended","PENDING":"pending","SUSPENDED":"suspended"};
	public $platform = "adwords";
	public $raw_property = "ServingStatus";
};
