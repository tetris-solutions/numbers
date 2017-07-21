<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "querymatchtypewithvariant";
	public $property = "QueryMatchTypeWithVariant";
	public $is_filter = true;
	public $type = "querymatchtypewithvariant";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"AUTO":"auto","BROAD":"broad","EXACT":"exact","EXPANDED":"broad","PHRASE":"phrase","NEAR_EXACT":"exact (close variant)","NEAR_PHRASE":"phrase (close variant)"};
	public $platform = "adwords";
	public $raw_property = "QueryMatchTypeWithVariant";
};
