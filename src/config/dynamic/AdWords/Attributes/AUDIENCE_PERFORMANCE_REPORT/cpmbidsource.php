<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "cpmbidsource";
	public $property = "CpmBidSource";
	public $is_filter = true;
	public $type = "bidsource";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"ADGROUP":"ad groups","CRITERION":"ad group criteria","ADGROUP_BIDDING_STRATEGY":"ad group bidding strategy","CAMPAIGN_BIDDING_STRATEGY":"campaign bidding strategy"};
	public $platform = "adwords";
	public $raw_property = "CpmBidSource";
};
