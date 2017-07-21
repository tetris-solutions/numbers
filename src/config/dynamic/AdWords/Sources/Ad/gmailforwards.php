<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\IntegerParser_TrivialSum_Parsable_Summable;

return new class extends IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "gmailforwards";
	public $metric = "gmailforwards";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["GmailForwards"];
	public $property = "GmailForwards";
	public $type = "integer";
};
