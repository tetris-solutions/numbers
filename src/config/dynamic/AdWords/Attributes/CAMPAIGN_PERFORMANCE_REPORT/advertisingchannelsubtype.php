<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "advertisingchannelsubtype";
	public $property = "AdvertisingChannelSubType";
	public $is_filter = true;
	public $type = "advertisingchannelsubtype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Unknown","SEARCH_MOBILE_APP":"Search Mobile App","DISPLAY_MOBILE_APP":"Display Mobile App","SEARCH_EXPRESS":"Search Express","DISPLAY_EXPRESS":"Display Express","UNIVERSAL_APP_CAMPAIGN":"Universal App Campaign"};
	public $platform = "adwords";
	public $raw_property = "AdvertisingChannelSubType";
};
