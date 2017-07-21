<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'searchexactmatchimpressionshare';

	public $incompatible = [
	    "ClickType",
	    "ConversionCategoryName",
	    "ConversionTrackerId",
	    "ConversionTypeName",
	    "ExternalConversionSource",
	    "Slot"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'adwords';

	public $property = 'SearchExactMatchImpressionShare';

	public $type = 'special';
};
