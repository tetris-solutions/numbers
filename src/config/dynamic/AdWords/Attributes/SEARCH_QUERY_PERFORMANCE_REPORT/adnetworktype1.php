<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "adnetworktype1";
	public $property = "AdNetworkType1";
	public $is_filter = true;
	public $type = "adnetworktype1";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","SEARCH":"Search Network","CONTENT":"Display Network","YOUTUBE_SEARCH":"YouTube Search","YOUTUBE_WATCH":"YouTube Videos"};
	public $platform = "adwords";
	public $raw_property = "AdNetworkType1";
};
