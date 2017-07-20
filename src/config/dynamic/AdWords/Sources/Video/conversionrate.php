<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "conversionrate";
	public $metric = "conversionrate";
	public $entity = "Video";
	public $platform = "adwords";
	public $report = "VIDEO_PERFORMANCE_REPORT";
	public $fields = ["ConversionRate"];
	public $property = "ConversionRate";
	public $type = "percentage";
	public $inferred_from = ["conversions","clicks"];
};
