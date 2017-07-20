<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoquartile50rate";
	public $metric = "videoquartile50rate";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["VideoQuartile50Rate"];
	public $property = "VideoQuartile50Rate";
	public $type = "percentage";
	public $inferred_from = ["videoviews"];
};
