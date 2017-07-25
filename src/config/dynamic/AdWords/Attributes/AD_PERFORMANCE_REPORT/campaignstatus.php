<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'campaignstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CampaignStatus';

	public $type = 'campaignstatus';

	public $values = [
	    "UNKNOWN" => "unknown",
	    "ENABLED" => "enabled",
	    "PAUSED" => "paused",
	    "REMOVED" => "removed"
	];
};
