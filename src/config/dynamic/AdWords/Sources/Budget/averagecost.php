<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $metric = "averagecost";
	public $entity = "Budget";
	public $platform = "adwords";
	public $report = "BUDGET_PERFORMANCE_REPORT";
	public $fields = ["AverageCost"];
	public $inferred_from = ["cost","interactions"];
};
