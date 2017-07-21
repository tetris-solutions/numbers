<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser_Parsable;

return new class extends Attribute_IntegerParser_Parsable {

	public $id = 'conversiontrackerid';

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

	public $property = 'ConversionTrackerId';

	public $type = 'integer';
};
