<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Segment';

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
	    "averageposition",
	    "clicks",
	    "contentbudgetlostimpressionshare",
	    "contentimpressionshare",
	    "contentranklostimpressionshare",
	    "cost",
	    "ctr",
	    "engagementrate",
	    "engagements",
	    "impressions",
	    "interactionrate",
	    "interactiontypes",
	    "interactions",
	    "invalidclickrate",
	    "invalidclicks",
	    "searchbudgetlostimpressionshare",
	    "searchexactmatchimpressionshare",
	    "searchimpressionshare",
	    "searchranklostimpressionshare",
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
