<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoviewrate";
	public $metric = "videoviewrate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["VideoViewRate"];
	public $property = "VideoViewRate";
	public $type = "percentage";
	public $inferred_from = ["videoviews","impressions"];
};
