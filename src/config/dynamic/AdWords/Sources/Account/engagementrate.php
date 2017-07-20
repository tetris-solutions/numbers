<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $metric = "engagementrate";
	public $entity = "Account";
	public $platform = "adwords";
	public $report = "ACCOUNT_PERFORMANCE_REPORT";
	public $fields = ["EngagementRate"];
	public $inferred_from = ["engagements","impressions"];
};
