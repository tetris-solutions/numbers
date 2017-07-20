<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "allconversionrate";
	public $metric = "allconversionrate";
	public $entity = "Location";
	public $platform = "adwords";
	public $report = "GEO_PERFORMANCE_REPORT";
	public $fields = ["AllConversionRate"];
	public $property = "AllConversionRate";
	public $type = "percentage";
	public $inferred_from = ["allconversions","clicks"];
};
