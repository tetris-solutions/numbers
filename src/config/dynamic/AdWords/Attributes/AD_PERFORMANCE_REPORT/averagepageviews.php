<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'averagepageviews';

	public $incompatible = [
	    "ClickType",
	    "ConversionCategoryName",
	    "ConversionTrackerId",
	    "ConversionTypeName",
	    "Device",
	    "ExternalConversionSource",
	    "Slot"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AveragePageviews';

	public $type = 'decimal';
};
