<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Shared\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'associatedcampaignstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'AssociatedCampaignStatus';

	public $type = 'campaignstatus';

	public $values = [
	    "ENABLED" => "enabled",
	    "PAUSED" => "paused",
	    "REMOVED" => "removed",
	    "UNKNOWN" => "unknown"
	];
};
