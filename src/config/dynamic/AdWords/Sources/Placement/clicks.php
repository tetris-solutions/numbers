<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceIntegerParserTrivialSumParsableSummable;

return new class extends AdWordsSourceIntegerParserTrivialSumParsableSummable {
	public $id = "clicks";
	public $metric = "clicks";
	public $entity = "Placement";
	public $platform = "adwords";
	public $report = "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT";
	public $fields = ["Clicks"];
	public $property = "Clicks";
	public $type = "integer";
};
