<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "device";
	public $property = "Device";
	public $is_filter = true;
	public $type = "devicetype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Other","DESKTOP":"Computers","HIGH_END_MOBILE":"Mobile devices with full browsers","TABLET":"Tablets with full browsers"};
	public $incompatible = ["AveragePageviews","AverageTimeOnSite","BounceRate","ClickAssistedConversionValue","ClickAssistedConversions","ClickAssistedConversionsOverLastClickConversions","HistoricalCreativeQualityScore","HistoricalLandingPageQualityScore","HistoricalQualityScore","HistoricalSearchPredictedCtr","ImpressionAssistedConversionValue","ImpressionAssistedConversions","ImpressionAssistedConversionsOverLastClickConversions","PercentNewVisitors"];
	public $platform = "adwords";
	public $raw_property = "Device";
};
