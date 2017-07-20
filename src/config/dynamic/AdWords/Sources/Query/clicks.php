<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "clicks";
	public $metric = "clicks";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["Clicks"];
	public $property = "Clicks";
	public $type = "integer";
};
