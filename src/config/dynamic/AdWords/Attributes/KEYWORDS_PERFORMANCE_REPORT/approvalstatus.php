<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'approvalstatus';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ApprovalStatus';

	public $type = 'approvalstatus';

	public $values = [
	    "APPROVED" => "approved",
	    "PENDING_REVIEW" => "pending review",
	    "UNDER_REVIEW" => "under review",
	    "DISAPPROVED" => "disapproved"
	];
};
