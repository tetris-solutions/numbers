<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'conversioncategoryname';

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
	    "Clicks",
	    "Cost",
	    "Ctr",
	    "EngagementRate",
	    "Engagements",
	    "Impressions",
	    "InteractionRate",
	    "InteractionTypes",
	    "Interactions",
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
