<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "advertisingchanneltype";
	public $property = "AdvertisingChannelType";
	public $is_filter = true;
	public $type = "advertisingchanneltype";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"Unknown","SEARCH":"Search","DISPLAY":"Display","SHOPPING":"Shopping","VIDEO":"Video","MULTI_CHANNEL":"Multi Channel"};
	public $platform = "adwords";
	public $raw_property = "AdvertisingChannelType";
};
