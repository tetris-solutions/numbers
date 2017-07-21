<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'campaignassociationstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'BudgetCampaignAssociationStatus';

	public $type = 'budgetcampaignassociationstatus';

	public $values = [
	    "ENABLED" => "Enabled",
	    "REMOVED" => "Removed",
	    "UNKNOWN" => "unknown"
	];
};
