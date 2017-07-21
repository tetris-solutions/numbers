<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "associatedcampaignstatus";
	public $property = "AssociatedCampaignStatus";
	public $is_filter = true;
	public $type = "campaignstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"ENABLED":"enabled","PAUSED":"paused","REMOVED":"removed","UNKNOWN":"unknown"};
	public $platform = "adwords";
	public $raw_property = "AssociatedCampaignStatus";
};
