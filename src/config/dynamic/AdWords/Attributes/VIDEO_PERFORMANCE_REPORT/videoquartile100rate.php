<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'videoquartile100rate';

	public $incompatible = [
	    "ClickType",
	    "ConversionCategoryName",
	    "ConversionTypeName",
	    "ExternalConversionSource"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = true;

	public $platform = 'adwords';

	public $property = 'VideoQuartile100Rate';

	public $type = 'percentage';
};
