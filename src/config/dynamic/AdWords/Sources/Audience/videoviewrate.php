<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoviewrate";
	public $metric = "videoviewrate";
	public $entity = "Audience";
	public $platform = "adwords";
	public $report = "AUDIENCE_PERFORMANCE_REPORT";
	public $fields = ["VideoViewRate"];
	public $property = "VideoViewRate";
	public $type = "percentage";
	public $inferred_from = ["videoviews","impressions"];
};
