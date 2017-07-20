<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "engagements";
	public $metric = "engagements";
	public $entity = "Keyword";
	public $platform = "adwords";
	public $report = "KEYWORDS_PERFORMANCE_REPORT";
	public $fields = ["Engagements"];
	public $property = "Engagements";
	public $type = "integer";
};
