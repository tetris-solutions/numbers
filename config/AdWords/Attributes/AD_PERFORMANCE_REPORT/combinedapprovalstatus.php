<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $group = 'Attribute';

	public $id = 'combinedapprovalstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'CombinedApprovalStatus';

	public $type = 'policyapprovalstatus';

	public $values = [
	    "UNKNOWN" => "POLICY_APPROVAL_STATUS_UNKNOWN",
	    "APPROVED" => "Approved",
	    "APPROVED_LIMITED" => "Approved (limited)",
	    "ELIGIBLE" => "Eligible",
	    "UNDER_REVIEW" => "Under review",
	    "DISAPPROVED" => "Disapproved",
	    "SITE_SUSPENDED" => "Site suspended"
	];
};
