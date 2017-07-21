<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'conversioncategoryname';

	public $incompatible = [
	    "AverageCpm",
	    "AverageCpv",
	    "Clicks",
	    "ConversionRate",
	    "Conversions",
	    "Cost",
	    "CostPerConversion",
	    "Ctr",
	    "EngagementRate",
	    "Engagements",
	    "Impressions",
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

	public $property = 'ConversionCategoryName';

	public $type = 'string';
};
