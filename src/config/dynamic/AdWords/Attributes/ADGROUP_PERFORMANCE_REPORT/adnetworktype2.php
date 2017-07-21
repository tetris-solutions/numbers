<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "adnetworktype2";
	public $property = "AdNetworkType2";
	public $is_filter = true;
	public $type = "adnetworktype2";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"unknown","SEARCH":"Google search","SEARCH_PARTNERS":"Search partners","CONTENT":"Display Network","YOUTUBE_SEARCH":"YouTube Search","YOUTUBE_WATCH":"YouTube Videos"};
	public $platform = "adwords";
	public $raw_property = "AdNetworkType2";
};
