<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "valueperallconversion";
	public $metric = "valueperallconversion";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["ValuePerAllConversion"];
	public $property = "ValuePerAllConversion";
	public $type = "decimal";
	public $inferred_from = ["allconversionvalue","allconversions"];
};
