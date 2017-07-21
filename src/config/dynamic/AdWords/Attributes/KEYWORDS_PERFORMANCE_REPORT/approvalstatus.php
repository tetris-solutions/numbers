<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "approvalstatus";
	public $property = "ApprovalStatus";
	public $is_filter = true;
	public $type = "approvalstatus";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"APPROVED":"approved","PENDING_REVIEW":"pending review","UNDER_REVIEW":"under review","DISAPPROVED":"disapproved"};
	public $platform = "adwords";
	public $raw_property = "ApprovalStatus";
};
