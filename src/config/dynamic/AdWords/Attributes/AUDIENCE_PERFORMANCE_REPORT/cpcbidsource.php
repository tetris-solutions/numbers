<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {

	public $id = 'cpcbidsource';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CpcBidSource';

	public $type = 'bidsource';

	public $values = [
	    "ADGROUP" => "ad groups",
	    "CRITERION" => "ad group criteria",
	    "ADGROUP_BIDDING_STRATEGY" => "ad group bidding strategy",
	    "CAMPAIGN_BIDDING_STRATEGY" => "campaign bidding strategy"
	];
};
