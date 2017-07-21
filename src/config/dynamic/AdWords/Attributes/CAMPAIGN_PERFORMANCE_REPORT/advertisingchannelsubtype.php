<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'advertisingchannelsubtype';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdvertisingChannelSubType';

	public $type = 'advertisingchannelsubtype';

	public $values = [
	    "UNKNOWN" => "Unknown",
	    "SEARCH_MOBILE_APP" => "Search Mobile App",
	    "DISPLAY_MOBILE_APP" => "Display Mobile App",
	    "SEARCH_EXPRESS" => "Search Express",
	    "DISPLAY_EXPRESS" => "Display Express",
	    "UNIVERSAL_APP_CAMPAIGN" => "Universal App Campaign"
	];
};
