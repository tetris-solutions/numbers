<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoquartile100rate";
	public $metric = "videoquartile100rate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile100Rate"];
	public $property = "VideoQuartile100Rate";
	public $type = "percentage";
	public $inferred_from = ["videoviews"];
};
