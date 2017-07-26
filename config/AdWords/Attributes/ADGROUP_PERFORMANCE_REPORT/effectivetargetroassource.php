<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'effectivetargetroassource';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'EffectiveTargetRoasSource';

	public $type = 'biddingsource';

	public $values = [
	    "UNKNOWN" => "BIDDING_SOURCE_UNKNOWN",
	    "ADGROUP" => "ad group",
	    "ADGROUP_BIDDING_STRATEGY" => "ad group bidding strategy",
	    "CAMPAIGN_BIDDING_STRATEGY" => "campaign bidding strategy"
	];
};
