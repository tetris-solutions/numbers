<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'historicalcreativequalityscore';

	public $incompatible = [
	    "AdNetworkType1",
	    "AdNetworkType2",
	    "ClickType",
	    "ConversionCategoryName",
	    "ConversionTrackerId",
	    "ConversionTypeName",
	    "Device",
	    "ExternalConversionSource",
	    "Slot"
	];

	public $is_dimension = false;

	public $is_filter = true;

	public $is_metric = true;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'HistoricalCreativeQualityScore';

	public $type = 'qualityscorebucket';

	public $values = [
	    "UNKNOWN" => "--",
	    "BELOW_AVERAGE" => "Below average",
	    "AVERAGE" => "Average",
	    "ABOVE_AVERAGE" => "Above average"
	];
};
