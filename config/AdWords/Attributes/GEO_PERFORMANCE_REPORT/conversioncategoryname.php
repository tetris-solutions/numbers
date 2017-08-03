<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Segment';

	public $id = 'conversioncategoryname';

	public $incompatible = [
	    "averagecost",
	    "averagecpc",
	    "averagecpm",
	    "averagecpv",
	    "averageposition",
	    "clicks",
	    "cost",
	    "ctr",
	    "impressions",
	    "interactionrate",
	    "interactiontypes",
	    "interactions",
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
