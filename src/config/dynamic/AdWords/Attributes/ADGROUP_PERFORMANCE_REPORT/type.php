<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "type";
	public $property = "AdGroupType";
	public $is_filter = true;
	public $type = "adgrouptype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Unknown","SEARCH_STANDARD":"Standard","SEARCH_DYNAMIC_ADS":"Search Dynamic Ads","DISPLAY_STANDARD":"Display","SHOPPING_PRODUCT_ADS":"Shopping - Product","SHOPPING_SHOWCASE_ADS":"Shopping - Showcase"};
	public $platform = "adwords";
	public $raw_property = "AdGroupType";
};
