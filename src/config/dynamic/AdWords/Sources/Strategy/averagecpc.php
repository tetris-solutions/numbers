<?php
namespace Tetris\Numbers\Config;

use Tetris\Numbers\Generated\AdWords\Source\AdWordsSourceFloatParserParsable;

return new class extends AdWordsSourceFloatParserParsable {
	public $id = "averagecpc";
	public $metric = "averagecpc";
	public $entity = "Strategy";
	public $platform = "adwords";
	public $report = "BID_GOAL_PERFORMANCE_REPORT";
	public $fields = ["AverageCpc"];
	public $property = "AverageCpc";
	public $type = "currency";
	public $inferred_from = ["cost","clicks"];
};
