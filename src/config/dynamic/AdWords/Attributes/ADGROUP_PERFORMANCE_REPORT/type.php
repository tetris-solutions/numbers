<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'type';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdGroupType';

	public $type = 'adgrouptype';

	public $values = [
	    "UNKNOWN" => "Unknown",
	    "SEARCH_STANDARD" => "Standard",
	    "SEARCH_DYNAMIC_ADS" => "Search Dynamic Ads",
	    "DISPLAY_STANDARD" => "Display",
	    "SHOPPING_PRODUCT_ADS" => "Shopping - Product",
	    "SHOPPING_SHOWCASE_ADS" => "Shopping - Showcase"
	];
};
