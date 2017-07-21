<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "type";
	public $property = "PartitionType";
	public $is_filter = true;
	public $type = "productpartitiontype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Unknown","SUBDIVISION":"Subdivision","UNIT":"Unit"};
	public $platform = "adwords";
	public $raw_property = "PartitionType";
};
