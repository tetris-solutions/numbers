<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Attribute\Attribute_RawParser;

return new class extends Attribute_RawParser {
	public $id = "contentbidcriteriontypegroup";
	public $property = "ContentBidCriterionTypeGroup";
	public $is_filter = true;
	public $type = "criteriontypegroup";
	public $is_metric = false;
	public $is_dimension = true;
	public $is_percentage = false;
	public $values = {"KEYWORD":"Keyword","USER_INTEREST_AND_LIST":"User Interest and List","VERTICAL":"Vertical","GENDER":"Gender","AGE_RANGE":"Age","PLACEMENT":"Placement","PARENT":"Parental status","NONE":"None","UNKNOWN":"unknown"};
	public $platform = "adwords";
	public $raw_property = "ContentBidCriterionTypeGroup";
};
