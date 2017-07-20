<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "videoviewrate";
	public $metric = "videoviewrate";
	public $entity = "Ad";
	public $platform = "adwords";
	public $report = "AD_PERFORMANCE_REPORT";
	public $fields = ["VideoViewRate"];
	public $property = "VideoViewRate";
	public $type = "percentage";
	public $inferred_from = ["videoviews","impressions"];
};
