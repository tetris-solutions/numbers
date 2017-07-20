<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecpe";
	public $metric = "averagecpe";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["AverageCpe"];
	public $property = "AverageCpe";
	public $type = "currency";
	public $inferred_from = ["cost","engagements"];
};
