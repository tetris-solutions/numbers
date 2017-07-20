<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourcePercentParserParsable;

return new class extends AdWordsSourcePercentParserParsable {
	public $id = "allconversionrate";
	public $metric = "allconversionrate";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["AllConversionRate"];
	public $property = "AllConversionRate";
	public $type = "percentage";
	public $inferred_from = ["allconversions","clicks"];
};
