<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser_Parsable;

return new class extends Attribute_IntegerParser_Parsable {

	public $id = 'conversiontrackerid';

	public $incompatible = [
	    "ActiveViewCpm",
	    "ActiveViewCtr",
	    "ActiveViewImpressions",
	    "ActiveViewMeasurability",
	    "ActiveViewMeasurableCost",
	    "ActiveViewMeasurableImpressions",
	    "ActiveViewViewability",
	    "AverageCost",
	    "AverageCpc",
	    "AverageCpe",
	    "AverageCpm",
	    "AverageCpv",
	    "AveragePosition",
	    "Clicks",
	    "Cost",
	    "Ctr",
	    "EngagementRate",
	    "Engagements",
	    "Impressions",
	    "InteractionRate",
	    "InteractionTypes",
	    "Interactions",
	    "VideoQuartile100Rate",
	    "VideoQuartile25Rate",
	    "VideoQuartile50Rate",
	    "VideoQuartile75Rate",
	    "VideoViewRate",
	    "VideoViews"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ConversionTrackerId';

	public $type = 'integer';
};
