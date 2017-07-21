<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'adnetworktype2';

	public $incompatible = [
	    "historicalcreativequalityscore",
	    "historicallandingpagequalityscore",
	    "historicalqualityscore",
	    "historicalsearchpredictedctr"
	];

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AdNetworkType2';

	public $type = 'adnetworktype2';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "SEARCH" => "Google search",
	    "SEARCH_PARTNERS" => "Search partners",
	    "CONTENT" => "Display Network",
	    "YOUTUBE_SEARCH" => "YouTube Search",
	    "YOUTUBE_WATCH" => "YouTube Videos"
	];
};
