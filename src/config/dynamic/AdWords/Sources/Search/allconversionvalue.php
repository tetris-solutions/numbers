<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserTrivialSumParsableSummable;

return new class extends AdWordsSourceFloatParserTrivialSumParsableSummable {
	public $id = "allconversionvalue";
	public $metric = "allconversionvalue";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["AllConversionValue"];
	public $property = "AllConversionValue";
	public $type = "decimal";
};
