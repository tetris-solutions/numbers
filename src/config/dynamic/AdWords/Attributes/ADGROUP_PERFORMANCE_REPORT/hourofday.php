<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_IntegerParser;

return new class extends Attribute_IntegerParser {
	public $id = "hourofday";
	public $property = "HourOfDay";
	public $is_filter = true;
	public $type = "integer";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $incompatible = ["AllConversionRate","AllConversionValue","AllConversions","AveragePageviews","AverageTimeOnSite","BounceRate","ClickAssistedConversionValue","ClickAssistedConversions","ClickAssistedConversionsOverLastClickConversions","CostPerAllConversion","CrossDeviceConversions","ImpressionAssistedConversionValue","ImpressionAssistedConversions","ImpressionAssistedConversionsOverLastClickConversions","PercentNewVisitors","RelativeCtr","Slot","ValuePerAllConversion"];
	public $platform = "adwords";
	public $raw_property = "HourOfDay";
};
