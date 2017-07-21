<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "combinedapprovalstatus";
	public $property = "CombinedApprovalStatus";
	public $is_filter = true;
	public $type = "policyapprovalstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"UNKNOWN":"POLICY_APPROVAL_STATUS_UNKNOWN","APPROVED":"Approved","APPROVED_LIMITED":"Approved (limited)","ELIGIBLE":"Eligible","UNDER_REVIEW":"Under review","DISAPPROVED":"Disapproved","SITE_SUSPENDED":"Site suspended"};
	public $platform = "adwords";
	public $raw_property = "CombinedApprovalStatus";
};
