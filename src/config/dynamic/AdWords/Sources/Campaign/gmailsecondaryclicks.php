<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "gmailsecondaryclicks";
	public $metric = "gmailsecondaryclicks";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["GmailSecondaryClicks"];
	public $property = "GmailSecondaryClicks";
	public $type = "integer";
};
