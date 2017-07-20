<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $metric = "videoviews";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["VideoViews"];
};
