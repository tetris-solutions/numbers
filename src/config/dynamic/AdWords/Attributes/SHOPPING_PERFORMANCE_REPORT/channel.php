<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "channel";
	public $property = "Channel";
	public $is_filter = true;
	public $type = "shoppingproductchannel";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","ONLINE":"Online","LOCAL":"Local Stores"};
	public $platform = "adwords";
	public $raw_property = "Channel";
};
