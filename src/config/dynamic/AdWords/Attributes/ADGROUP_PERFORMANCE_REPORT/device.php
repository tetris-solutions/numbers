<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'device';

	public $incompatible = [
	    "AveragePageviews",
	    "AverageTimeOnSite",
	    "BounceRate",
	    "ClickAssistedConversionValue",
	    "ClickAssistedConversions",
	    "ClickAssistedConversionsOverLastClickConversions",
	    "ImpressionAssistedConversionValue",
	    "ImpressionAssistedConversions",
	    "ImpressionAssistedConversionsOverLastClickConversions",
	    "NumOfflineImpressions",
	    "NumOfflineInteractions",
	    "OfflineInteractionRate",
	    "PercentNewVisitors",
	    "RelativeCtr"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'Device';

	public $type = 'devicetype';

	public $values = [
	    "UNKNOWN" => "Other",
	    "DESKTOP" => "Computers",
	    "HIGH_END_MOBILE" => "Mobile devices with full browsers",
	    "TABLET" => "Tablets with full browsers"
	];
};
