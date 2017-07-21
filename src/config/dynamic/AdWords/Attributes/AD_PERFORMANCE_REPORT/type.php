<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "type";
	public $property = "AdType";
	public $is_filter = true;
	public $type = "type";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"DEPRECATED_AD":"Other","IMAGE_AD":"Image ad","PRODUCT_AD":"Shopping ad","TEMPLATE_AD":"Display ad","TEXT_AD":"Text ad","THIRD_PARTY_REDIRECT_AD":"Third party ad","DYNAMIC_SEARCH_AD":"Dynamic search ad","CALL_ONLY_AD":"Call only ad","EXPANDED_TEXT_AD":"Expanded text ad","RESPONSIVE_DISPLAY_AD":"Responsive ad","SHOWCASE_AD":"Showcase ad","UNKNOWN":"unknown"};
	public $platform = "adwords";
	public $raw_property = "AdType";
};
