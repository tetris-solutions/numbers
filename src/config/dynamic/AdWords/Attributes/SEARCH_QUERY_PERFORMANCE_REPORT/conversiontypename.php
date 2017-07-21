<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'conversiontypename';

	public $incompatible = [
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

	public $property = 'ConversionTypeName';

	public $type = 'string';
};
