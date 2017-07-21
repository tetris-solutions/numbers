<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser;

return new class extends Attribute_IntegerParser {

	public $id = 'hourofday';

	public $incompatible = [
	    "AllConversionRate",
	    "AllConversionValue",
	    "AllConversions",
	    "AverageFrequency",
	    "AveragePageviews",
	    "AverageTimeOnSite",
	    "BounceRate",
	    "ClickAssistedConversionValue",
	    "ClickAssistedConversions",
	    "ClickAssistedConversionsOverLastClickConversions",
	    "CostPerAllConversion",
	    "CrossDeviceConversions",
	    "ImpressionAssistedConversionValue",
	    "ImpressionAssistedConversions",
	    "ImpressionAssistedConversionsOverLastClickConversions",
	    "ImpressionReach",
	    "InvalidClickRate",
	    "InvalidClicks",
	    "PercentNewVisitors",
	    "RelativeCtr",
	    "Slot",
	    "ValuePerAllConversion"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'HourOfDay';

	public $type = 'integer';
};
