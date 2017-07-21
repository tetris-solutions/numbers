<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\Source_IntegerParser_TrivialSum_Parsable_Summable;

return new class extends Source_IntegerParser_TrivialSum_Parsable_Summable {
	public $id = "gmailsecondaryclicks";
	public $metric = "gmailsecondaryclicks";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["GmailSecondaryClicks"];
	public $property = "GmailSecondaryClicks";
	public $type = "integer";
};
