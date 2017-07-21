<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "channelexclusivity";
	public $property = "ChannelExclusivity";
	public $is_filter = true;
	public $type = "shoppingproductchannelexclusivity";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","SINGLE_CHANNEL":"Single Channel","MULTI_CHANNEL":"Multi-Channel"};
	public $platform = "adwords";
	public $raw_property = "ChannelExclusivity";
};
