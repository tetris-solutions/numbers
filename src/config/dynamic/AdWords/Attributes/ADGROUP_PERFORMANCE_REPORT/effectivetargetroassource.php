<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "effectivetargetroassource";
	public $property = "EffectiveTargetRoasSource";
	public $is_filter = true;
	public $type = "biddingsource";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"BIDDING_SOURCE_UNKNOWN","ADGROUP":"ad group","ADGROUP_BIDDING_STRATEGY":"ad group bidding strategy","CAMPAIGN_BIDDING_STRATEGY":"campaign bidding strategy"};
	public $platform = "adwords";
	public $raw_property = "EffectiveTargetRoasSource";
};
