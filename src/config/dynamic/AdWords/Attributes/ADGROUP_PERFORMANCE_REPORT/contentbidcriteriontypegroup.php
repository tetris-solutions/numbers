<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\Attribute\Attribute_RawParser_Parsable;

return new class extends Attribute_RawParser_Parsable {

	public $id = 'contentbidcriteriontypegroup';

	public $is_dimension = true;

	public $is_filter = true;

	public $is_metric = false;

	public $is_percentage = false;

	public $platform = 'adwords';

	public $property = 'ContentBidCriterionTypeGroup';

	public $type = 'criteriontypegroup';

	public $values = [
	    "KEYWORD" => "Keyword",
	    "USER_INTEREST_AND_LIST" => "User Interest and List",
	    "VERTICAL" => "Vertical",
	    "GENDER" => "Gender",
	    "AGE_RANGE" => "Age",
	    "PLACEMENT" => "Placement",
	    "PARENT" => "Parental status",
	    "NONE" => "None",
	    "UNKNOWN" => "unknown"
	];
};
