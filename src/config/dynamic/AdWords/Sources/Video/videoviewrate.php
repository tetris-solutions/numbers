<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $metric = "videoviewrate";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["VideoViewRate"];
	public $inferred_from = ["videoviews","impressions"];
};
