<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $metric = "allconversionrate";
	public $entity = "AdGroup";
	public $platform = "adwords";
	public $report = "ADGROUP_PERFORMANCE_REPORT";
	public $fields = ["AllConversionRate"];
	public $inferred_from = ["allconversions","clicks"];
};
