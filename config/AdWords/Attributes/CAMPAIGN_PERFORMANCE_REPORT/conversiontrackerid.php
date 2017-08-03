<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_IntegerParser_Parsable;

return new class extends Attribute_IntegerParser_Parsable {

	public $group = 'Segment';

	public $id = 'conversiontrackerid';

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
	    "averagefrequency",
	    "averagepageviews",
	    "averageposition",
	    "averagetimeonsite",
	    "bouncerate",
	    "clickassistedconversionvalue",
	    "clickassistedconversions",
	    "clickassistedconversionsoverlastclickconversions",
	    "clicks",
	    "contentbudgetlostimpressionshare",
	    "contentimpressionshare",
	    "contentranklostimpressionshare",
	    "cost",
	    "ctr",
	    "engagementrate",
	    "engagements",
	    "gmailforwards",
	    "gmailsaves",
	    "gmailsecondaryclicks",
	    "impressionassistedconversionvalue",
	    "impressionassistedconversions",
	    "impressionassistedconversionsoverlastclickconversions",
	    "impressionreach",
	    "impressions",
	    "interactionrate",
	    "interactiontypes",
	    "interactions",
	    "invalidclickrate",
	    "invalidclicks",
	    "numofflineimpressions",
	    "numofflineinteractions",
	    "offlineinteractionrate",
	    "percentnewvisitors",
	    "relativectr",
	    "searchbudgetlostimpressionshare",
	    "searchexactmatchimpressionshare",
	    "searchimpressionshare",
	    "searchranklostimpressionshare",
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

	public $property = 'ConversionTrackerId';

	public $type = 'integer';
};
