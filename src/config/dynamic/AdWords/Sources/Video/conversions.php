<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $metric = "conversions";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["Conversions"];
};
