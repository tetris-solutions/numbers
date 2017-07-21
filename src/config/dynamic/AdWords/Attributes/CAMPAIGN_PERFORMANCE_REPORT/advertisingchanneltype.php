<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'advertisingchanneltype';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdvertisingChannelType';

	public $type = 'advertisingchanneltype';

	public $values = [
	    "UNKNOWN" => "Unknown",
	    "SEARCH" => "Search",
	    "DISPLAY" => "Display",
	    "SHOPPING" => "Shopping",
	    "VIDEO" => "Video",
	    "MULTI_CHANNEL" => "Multi Channel"
	];
};
