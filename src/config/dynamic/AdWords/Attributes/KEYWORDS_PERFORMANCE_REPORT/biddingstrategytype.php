<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'biddingstrategytype';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'BiddingStrategyType';

	public $type = 'biddingstrategytype';

	public $values = [
	    "MANUAL_CPC" => "cpc",
	    "MANUAL_CPV" => "cpv",
	    "MANUAL_CPM" => "cpm",
	    "PAGE_ONE_PROMOTED" => "Target search page location",
	    "TARGET_SPEND" => "Maximize clicks",
	    "ENHANCED_CPC" => "Enhanced CPC",
	    "TARGET_CPA" => "Target CPA",
	    "TARGET_ROAS" => "Target ROAS",
	    "TARGET_OUTRANK_SHARE" => "Target Outranking Share",
	    "NONE" => "None",
	    "UNKNOWN" => "unknown"
	];
};
