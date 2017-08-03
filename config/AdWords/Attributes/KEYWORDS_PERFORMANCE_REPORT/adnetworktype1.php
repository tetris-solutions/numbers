<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Segment';

	public $id = 'adnetworktype1';

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

	public $property = 'AdNetworkType1';

	public $type = 'adnetworktype1';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "SEARCH" => "Search Network",
	    "CONTENT" => "Display Network",
	    "YOUTUBE_SEARCH" => "YouTube Search",
	    "YOUTUBE_WATCH" => "YouTube Videos"
	];
};
