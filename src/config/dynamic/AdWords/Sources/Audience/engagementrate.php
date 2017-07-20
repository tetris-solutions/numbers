<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "engagementrate";
	public $metric = "engagementrate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["EngagementRate"];
	public $property = "EngagementRate";
	public $type = "percentage";
	public $inferred_from = ["engagements","impressions"];
};
