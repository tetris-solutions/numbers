<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $metric = "impressions";
	public $entity = "Query";
	public $platform = "adwords";
	public $report = "KEYWORDLESS_QUERY_REPORT";
	public $fields = ["Impressions"];
};
