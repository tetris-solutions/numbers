<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "viewthroughconversions";
	public $metric = "viewthroughconversions";
	public $entity = "Search";
	public $platform = "adwords";
	public $report = "SEARCH_QUERY_PERFORMANCE_REPORT";
	public $fields = ["ViewThroughConversions"];
	public $property = "ViewThroughConversions";
	public $type = "integer";
};
