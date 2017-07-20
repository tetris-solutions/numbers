<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "gmailsecondaryclicks";
	public $metric = "gmailsecondaryclicks";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["GmailSecondaryClicks"];
	public $property = "GmailSecondaryClicks";
	public $type = "integer";
};
