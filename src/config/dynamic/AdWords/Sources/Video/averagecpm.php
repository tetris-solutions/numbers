<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $metric = "averagecpm";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["AverageCpm"];
	public $inferred_from = ["cost","impressions"];
};
