<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "productcondition";
	public $property = "ProductCondition";
	public $is_filter = true;
	public $type = "shoppingproductcondition";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","NEW":"New","REFURBISHED":"Refurbished","USED":"Used"};
	public $platform = "adwords";
	public $raw_property = "ProductCondition";
};
