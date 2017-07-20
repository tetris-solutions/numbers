<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoquartile100rate";
	public $metric = "videoquartile100rate";
	public $entity = "Campaign";
	public $platform = "adwords";
	public $report = "CAMPAIGN_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile100Rate"];
	public $property = "VideoQuartile100Rate";
	public $type = "percentage";
	public $inferred_from = ["videoviews"];
};
