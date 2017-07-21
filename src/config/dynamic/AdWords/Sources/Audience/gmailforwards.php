<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "gmailforwards";
	public $metric = "gmailforwards";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["GmailForwards"];
	public $property = "GmailForwards";
	public $type = "integer";
};
