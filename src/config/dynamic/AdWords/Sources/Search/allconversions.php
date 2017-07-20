<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "allconversions";
	public $metric = "allconversions";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["AllConversions"];
	public $property = "AllConversions";
	public $type = "decimal";
};
