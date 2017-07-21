<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'videoquartile50rate';

	public $incompatible = [
	    "ConversionCategoryName",
	    "ConversionTrackerId",
	    "ConversionTypeName",
	    "ExternalConversionSource"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'adwords';

	public $property = 'VideoQuartile50Rate';

	public $type = 'percentage';
};
