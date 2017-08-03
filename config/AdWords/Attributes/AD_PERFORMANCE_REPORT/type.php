<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Attribute';

	public $id = 'type';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdType';

	public $type = 'type';

	public $values = [
	    "DEPRECATED_AD" => "Other",
	    "IMAGE_AD" => "Image ad",
	    "PRODUCT_AD" => "Shopping ad",
	    "TEMPLATE_AD" => "Display ad",
	    "TEXT_AD" => "Text ad",
	    "THIRD_PARTY_REDIRECT_AD" => "Third party ad",
	    "DYNAMIC_SEARCH_AD" => "Dynamic search ad",
	    "CALL_ONLY_AD" => "Call only ad",
	    "EXPANDED_TEXT_AD" => "Expanded text ad",
	    "RESPONSIVE_DISPLAY_AD" => "Responsive ad",
	    "SHOWCASE_AD" => "Showcase ad",
	    "UNKNOWN" => "unknown"
	];
};
