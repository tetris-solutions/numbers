<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'conversioncategoryname';

	public $incompatible = [
	    "averagecpm",
	    "averagecpv",
	    "clicks",
	    "conversionrate",
	    "conversions",
	    "cost",
	    "costperconversion",
	    "ctr",
	    "engagementrate",
	    "engagements",
	    "impressions",
	    "videoquartile100rate",
	    "videoquartile25rate",
	    "videoquartile50rate",
	    "videoquartile75rate",
	    "videoviewrate",
	    "videoviews"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ConversionCategoryName';

	public $type = 'string';
};
