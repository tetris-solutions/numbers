<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_IntegerParser_Parsable;

return new class extends Attribute_IntegerParser_Parsable {

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
	    "averagepageviews",
	    "averageposition",
	    "averagetimeonsite",
	    "bouncerate",
	    "clickassistedconversionvalue",
	    "clickassistedconversions",
	    "clickassistedconversionsoverlastclickconversions",
	    "clicks",
	    "cost",
	    "ctr",
	    "engagementrate",
	    "engagements",
	    "gmailforwards",
	    "gmailsaves",
	    "gmailsecondaryclicks",
	    "historicalcreativequalityscore",
	    "historicallandingpagequalityscore",
	    "historicalqualityscore",
	    "historicalsearchpredictedctr",
	    "impressionassistedconversionvalue",
	    "impressionassistedconversions",
	    "impressionassistedconversionsoverlastclickconversions",
	    "impressions",
	    "interactionrate",
	    "interactiontypes",
	    "interactions",
	    "percentnewvisitors",
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
