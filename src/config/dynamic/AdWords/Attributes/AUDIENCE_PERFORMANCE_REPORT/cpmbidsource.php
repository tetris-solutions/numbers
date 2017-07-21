<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'cpmbidsource';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CpmBidSource';

	public $type = 'bidsource';

	public $values = [
	    "ADGROUP" => "ad groups",
	    "CRITERION" => "ad group criteria",
	    "ADGROUP_BIDDING_STRATEGY" => "ad group bidding strategy",
	    "CAMPAIGN_BIDDING_STRATEGY" => "campaign bidding strategy"
	];
};
