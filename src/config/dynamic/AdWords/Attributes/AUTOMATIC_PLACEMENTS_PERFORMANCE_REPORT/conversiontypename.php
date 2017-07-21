<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'conversiontypename';

	public $incompatible = [
	    "activeviewcpm",
	    "activeviewctr",
	    "activeviewimpressions",
	    "activeviewmeasurability",
	    "activeviewmeasurablecost",
	    "activeviewmeasurableimpressions",
	    "activeviewviewability",
	    "averagecost",
	    "averagecpc",
	    "averagecpe",
	    "averagecpm",
	    "averagecpv",
	    "clicks",
	    "cost",
	    "ctr",
	    "engagementrate",
	    "engagements",
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

	public $property = 'ConversionTypeName';

	public $type = 'string';
};
