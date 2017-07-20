<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "videoviews";
	public $metric = "videoviews";
	public $entity = "Location";
	public $platform = "adwords";
	public $report = "GEO_PERFORMANCE_REPORT";
	public $fields = ["VideoViews"];
	public $property = "VideoViews";
	public $type = "integer";
};
